<?php

declare(strict_types=1);

namespace Customize\Controller;

use Customize\Service\CartService as CustomizedCartService;
use Eccube\Controller\AbstractController;
use Eccube\Entity\CartItem;
use Eccube\Entity\Master\ProductStatus;
use Eccube\Entity\Product;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Form\Type\AddCartType;
use Eccube\Repository\ProductClassRepository;
use Eccube\Repository\ClassCategoryRepository;
use Eccube\Service\CartService;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Eccube\Repository\OrderRepository;

class FrontController extends AbstractController
{
    
    /** @var OrderRepository */
    private $orderRepository;
    
    /** @var ProductClassRepository */
    private $productClassRepository;
    private $classCategoryRepository;

    /** @var CartService */
    private $cartService;

    /** @var PurchaseFlow */
    protected $purchaseFlow;

    public function __construct(CartService $cartService, 
    PurchaseFlow $purchaseFlow, 
    OrderRepository $orderRepository, 
    ProductClassRepository $productClassRepository,
    ClassCategoryRepository $classCategoryRepository)
    {
        $this->cartService = $cartService;
        $this->purchaseFlow = $purchaseFlow;
        $this->orderRepository = $orderRepository;
        $this->productClassRepository = $productClassRepository;
        $this->classCategoryRepository = $classCategoryRepository;
    }

    /**
     * EC-CUBE標準の「カートに追加」を上書き
     *
     * @Route("/products/add_cart/{id}", name="product_add_cart", methods={"POST"}, requirements={"id" = "\d+"})
     */
    public function productAddCart(Request $request, Product $product): Response
    {
        if (! $this->isAvailableProduct($product)) {
            throw new NotFoundHttpException();
        }

        $builder = $this->formFactory->createNamedBuilder(
            '',
            AddCartType::class,
            null,
            [
                'product' => $product,
                'id_add_product_id' => false,
            ]
        );

        $event = new EventArgs(
            [
                'builder' => $builder,
                'Product' => $product,
            ],
            $request
        );
        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_PRODUCT_CART_ADD_INITIALIZE, $event);

        $form = $builder->getForm();
        $form->handleRequest($request);



        $data = $form->getData();
        assert($data instanceof CartItem);

        log_info(
            'カート追加処理開始1',
            [
                'product_id' => $product->getId(),
                'product_class_id' => $data->getProductClassId(),
                'quantity' => $data->getQuantity(),
                'ship' => $data->getShip(),
                'data' => serialize($data),
            ]
        );

        assert($this->cartService instanceof CustomizedCartService);

        $this->cartService->addCartItem($data->getProductClass(), $data->getQuantity(), [
            'ship' => $data->getShip(),
        ]);

        $errorMessages = [];
        $carts = $this->cartService->getCarts();
        foreach ($carts as $Cart) {
            $result = $this->purchaseFlow->validate($Cart, new PurchaseContext($Cart, $this->getUser()));

            if ($result->hasError()) {
                $this->cartService->removeProduct($data->getProductClassId());
                foreach ($result->getErrors() as $error) {
                    $errorMessages[] = $error->getMessage();
                }
            }

            foreach ($result->getWarning() as $warning) {
                $errorMessages[] = $warning->getMessage();
            }
        }

        $this->cartService->save();

        log_info(
            'カート追加処理完了',
            [
                'product_id' => $product->getId(),
                'product_class_id' => $data->getProductClassId(),
                'quantity' => $data->getQuantity(),
            ]
        );

        $event = new EventArgs(
            [
                'form' => $form,
                'Product' => $product,
            ],
            $request
        );
        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_PRODUCT_CART_ADD_COMPLETE, $event);

        if ($event->getResponse() !== null) {
            return $event->getResponse();
        }

        if ($request->isXmlHttpRequest()) {
            if (empty($errorMessages)) {
                return $this->json([
                    'done' => true,
                    'messages' => [trans('front.product.add_cart_complete')],
                ]);
            }

            return $this->json([
                'done' => false,
                'messages' => $errorMessages,
            ]);
        }

        foreach ($errorMessages as $errorMessage) {
            $this->addRequestError($errorMessage);
        }

        return $this->redirectToRoute('cart');
    }

    /**
     * @see Eccube\Controller\ProductController::checkVisibility()
     */
    private function isAvailableProduct(Product $product): bool
    {
        if ($this->session->has('_security_admin')) {
            return true;
        }

        $status = $product->getStatus();

        return $status !== null && $status->getId() === ProductStatus::DISPLAY_SHOW;
    }

    
    /**
     * EC-CUBE標準の「カートに追加」を上書き
     *
     * @Route("/option/withraw", name="option_withraw", methods={"GET", "POST"})
     */
    public function withraw(Request $request)
    {
        $type = $request->get('type');
        $is_remove = $request->get('is_remove');
        if (!$is_remove && !(date('d')<16)){
            return $this->json(['done' => false, 'messages' => '15日後にはこの操作を進めることはできません。']);
        }

        $user = $this->getUser();
        
        $Orders = $this->orderRepository->findBy(['Customer'=>$user], ['order_date'=>'desc']);
        if (empty($Orders)){
            return $this->json(['done' => false, 'messages' => '注文データが存在しません。']);
        }

        foreach($Orders as $Order){

            foreach($Order->getOrderItems() as $OrderItem){
                if (!$OrderItem->isProduct()) continue;
                if ($type=='secret'){
                    if ($is_remove == $OrderItem->isSecretWithraw()) continue;
                    $NewClassCategory2 = $OrderItem->getProductClass()->getClassCategory2();
                    if ($is_remove){
                        $NewClassCategory1 = $this->classCategoryRepository->find(9);
                        $OrderItem->setSecretOption($OrderItem->getProductClass()->getClassCategory1()->getId());
                    }else{
                        $NewClassCategory1 = $this->classCategoryRepository->find($OrderItem->getSecretOption());
                        $OrderItem->setSecretOption(null);
                    }
                    $OrderItem->setSecretWithraw($is_remove);
                }
                if ($type=='plan'){
                    if ($is_remove == $OrderItem->isPlanWithraw()) continue;
                    $NewClassCategory1 = $OrderItem->getProductClass()->getClassCategory1();
                    if ($is_remove){
                        $NewClassCategory2 = $this->classCategoryRepository->find(11);
                        $OrderItem->setPlanOption($OrderItem->getProductClass()->getClassCategory2()->getId());
                    }else{
                        $NewClassCategory2 = $this->classCategoryRepository->find($OrderItem->getPlanOption());
                        $OrderItem->setPlanOption(null);
                    }
                    $OrderItem->setPlanWithraw($is_remove);
                }
    
                $ProductClass = $this->productClassRepository->findOneBy([
                    'ClassCategory1' => $NewClassCategory1,
                    'ClassCategory2' => $NewClassCategory2,
                ]);
                $OrderItem->setProductClass($ProductClass);
                $OrderItem->setClassCategoryName1($NewClassCategory1->getName());
                $OrderItem->setClassCategoryName2($NewClassCategory2->getName());
                $OrderItem->setPrice($ProductClass->getPrice02());
                $OrderItem->setTax($ProductClass->getPrice02()*$OrderItem->getTaxRate()/100);
    
                $this->entityManager->persist($OrderItem);
            }
        }

        $this->entityManager->flush();
        // if ()
        return $this->json(['done' => true]);
    }
}