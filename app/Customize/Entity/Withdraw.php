<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Withdraw
 *
 * @ORM\Table(name="dtb_withdraw")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Customize\Repository\WithdrawRepository")
 */
class Withdraw extends \Eccube\Entity\AbstractEntity
{        
    const SECRET = 1;
    const PLAN = 2;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Eccube\Entity\Order
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $Order;    
    
    /**
     * @var int
     *
     * @ORM\Column(name="withdraw_type", type="string", length=10, nullable=true)
     */
    private $withdraw_type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_date", type="datetimetz")
     */
    private $request_date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", options={"default":true})
     */
    private $visible;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function getOrder(){
        return $this->Order;
    }

    public function setOrder($Order){
        $this->Order = $Order;
        return $this;
    }

    public function getWithdrawType(){
        return $this->withdraw_type;
    }

    public function setWithdrawType($withdraw_type){
        $this->withdraw_type = $withdraw_type;
        return $this;
    }

    public function getRequestDate(){
        return $this->request_date;
    }

    public function setRequestDate($request_date){
        $this->request_date = $request_date;
        return $this;
    }

    public function isVisible(){
        return $this->visible;
    }

    public function setVisible($visible){
        $this->visible = $visible;
        return $this;
    }
}
