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
use Eccube\Service\CartService;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /** @var CartService */
    private $cartService;

    /** @var PurchaseFlow */
    protected $purchaseFlow;

    public function __construct(CartService $cartService, PurchaseFlow $purchaseFlow)
    {
        $this->cartService = $cartService;
        $this->purchaseFlow = $purchaseFlow;
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
}