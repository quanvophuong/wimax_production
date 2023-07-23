<?php

namespace Plugin\StripeRec\Repository;

use Eccube\Repository\AbstractRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Plugin\StripeRec\Repository\StripeRecOrderItemRepository;
use Plugin\StripeRec\Entity\StripeRecOrder;
use Doctrine\Common\Collections\ArrayCollection;
use Eccube\Util\StringUtil;
use Carbon\Carbon;

class StripeRecOrderRepository extends AbstractRepository{
    
    private $rec_item_repo;

    public function __construct(
        RegistryInterface $registry,
        StripeRecOrderItemRepository $rec_item_repo){
        parent::__construct($registry, StripeRecOrder::class);
        
        $this->rec_item_repo = $rec_item_repo;
    }

    
    public function getByPriceId($price_id, $include_schedule = false){        
        log_info("StripeRecOrderRepository---");  

        $rec_orders = new ArrayCollection();
        $rec_items = $this->rec_item_repo->getByPriceId($price_id);
        if(empty($rec_items)){       
            log_info("StripeRecOrderRepository---");  
            return $rec_orders;
        }
        
        foreach($rec_items as $rec_item){
            $rec_order = $rec_item->getRecOrder();
            $exclude_flg = $include_schedule ? $rec_order->getRecStatus() == StripeRecOrder::REC_STATUS_CANCELED : $rec_order->getRecStatus() == StripeRecOrder::REC_STATUS_CANCELED || strpos($rec_order->getRecStatus(), StripeRecOrder::REC_STATUS_SCHEDULED) !== false;
            
            if($exclude_flg){
                continue;
            }
            log_info("StripeRecOrderRepository---checking rec order---" . $rec_order->getId());
            if(!$rec_orders->contains($rec_order)){
                $rec_orders->add($rec_order);
            }
        }
        return $rec_orders;
    }
    public function getQueryBuilderBySearchDataForAdmin($search_data){
        $qb = $this->createQueryBuilder('ro')
            ->select('ro, o')
            ->leftJoin('ro.Order', 'o');            
        if(isset($search_data['multi']) && StringUtil::isNotBlank($search_data['multi'])) {
            $multi = preg_match('/^\d{0,10}$/', $search_data['multi']) ? $search_data['multi'] : null;
            $qb
                ->andWhere('ro.id = :multi OR o.name01 LIKE :likemulti OR o.name02 LIKE :likemulti OR '.
                            'o.kana01 LIKE :likemulti OR o.kana02 LIKE :likemulti OR o.company_name LIKE :likemulti OR '.
                            'o.order_no LIKE :likemulti OR o.email LIKE :likemulti OR o.phone_number LIKE :likemulti')
                ->setParameter('multi', $multi)
                ->setParameter('likemulti', '%'.$search_data['multi'].'%');
        }
        
        if(isset($search_data['paid_status']) && StringUtil::isNotBlank($search_data['paid_status'])){
            
            $qb
                ->andWhere($qb->expr()->in('ro.paid_status', ':paid_status'))
                ->setParameter('paid_status', $search_data['paid_status']);
        }
        if(isset($search_data['rec_status']) && StringUtil::isNotBlank($search_data['rec_status'])){
            $qb
                ->andWhere($qb->expr()->in('ro.rec_status', ':rec_status'))
                ->setParameter('rec_status', $search_data['rec_status']);
        }

        if (isset($search_data['is_pause_subscriptions']) && StringUtil::isNotBlank($search_data['is_pause_subscriptions'])) {
            $qb
            ->andWhere('ro.is_pause_subscriptions = true')
            ->andWhere('ro.rec_status not like :not_canceled')
            ->setParameter('not_canceled', '%' . StripeRecOrder::REC_STATUS_CANCELED . '%')
            ->andWhere('ro.date_pause_subscriptions <= :date_check')
            ->setParameter('date_check', $search_data['dateCheck']);
        }
    
        $qb->orderBy('ro.rec_status', 'ASC');
        return $qb->addorderBy('ro.id', 'DESC');

    }

    public function getScheduleQueryBySearchDataForAdmin($search_data){
        $qb = $this->createQueryBuilder('ro')
            ->select('ro, o')
            ->leftJoin('ro.Order', 'o');            
        if(isset($search_data['multi']) && StringUtil::isNotBlank($search_data['multi'])) {
            $multi = preg_match('/^\d{0,10}$/', $search_data['multi']) ? $search_data['multi'] : null;
            $qb
                ->andWhere('ro.id = :multi OR o.name01 LIKE :likemulti OR o.name02 LIKE :likemulti OR '.
                            'o.kana01 LIKE :likemulti OR o.kana02 LIKE :likemulti OR o.company_name LIKE :likemulti OR '.
                            'o.order_no LIKE :likemulti OR o.email LIKE :likemulti OR o.phone_number LIKE :likemulti')
                ->setParameter('multi', $multi)
                ->setParameter('likemulti', '%'.$search_data['multi'].'%');
        }
        if(isset($search_data['schedule_status']) && StringUtil::isNotBlank($search_data['schedule_status'])){
            $qb->andWhere($qb->expr()->in('ro.rec_status', ':schedule'))
                ->setParameter('schedule', $search_data['schedule_status']);            
        }else{
            $qb->andWhere('ro.rec_status like :schedule')
            ->setParameter('schedule', '%' . StripeRecOrder::REC_STATUS_SCHEDULED . '%');
        }
        $qb->orderBy('ro.create_date', 'desc');
        return $qb;
    }
    public function getQueryBuilderByCustomer($Customer){
        $qb = $this->createQueryBuilder("ro")
            ->where("ro.Customer = :customer")
            // ->andWhere("ro.rec_status = :rec_status")
            ->setParameter("customer", $Customer)
            // ->setParameter("rec_status", StripeRecOrder::REC_STATUS_ACTIVE);
            ->andWhere('ro.rec_status not like :not_schedule')
            ->setParameter('not_schedule', '%' . StripeRecOrder::REC_STATUS_SCHEDULED . '%');
        return $qb->orderBy("ro.create_date", "DESC");
    }

    public function getScheduleQueryByCustomer($Customer){
        $qb = $this->createQueryBuilder('ro')
            ->where("ro.Customer = :customer")
            ->setParameter("customer", $Customer)
            ->andWhere('ro.rec_status like :schedule')
            ->setParameter('schedule', '%' . StripeRecOrder::REC_STATUS_SCHEDULED . '%');
        return $qb->orderBy('ro.create_date', 'desc');
    }    
    public function getByBundledCodeNotStarting($code){
        $query = $this->createQueryBuilder('ro')
                ->where('ro.rec_status like :schedule')
                ->setParameter('schedule', '%' . StripeRecOrder::REC_STATUS_SCHEDULED . '%')
                ->andWhere('ro.bundling like :code')
                ->setParameter('code', '%' . $code . ":%")
                ->getQuery();
        return $query->execute();
    }
    
    public function findRecOrderByCustomerAndOrderId($customer, $orderId)
    {
        return $this->createQueryBuilder("ro")
            ->where("ro.Customer = :customer")
            ->setParameter("customer", $customer)
            ->andWhere("ro.Order = :orderId")
            ->setParameter("orderId", $orderId)
            ->orderBy("ro.create_date", "DESC")
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
}