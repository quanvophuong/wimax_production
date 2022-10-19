<?php

declare(strict_types=1);

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\OrderItem")
 */
trait OrderItemExtension
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="secret_withraw", type="boolean", nullable=true)
     */
    private $secret_withraw;

    /**
     * @return boolean
     */
    public function isSecretWithraw()
    {
        return $this->secret_withraw;
    }

    /**
     * @param boolean $secret_withraw
     *
     * @return this
     */
    public function setSecretWithraw($secret_withraw)
    {
        $this->secret_withraw = $secret_withraw;

        return $this;
    }
    /**
     * @var boolean
     *
     * @ORM\Column(name="plan_withraw", type="boolean", nullable=true)
     */
    private $plan_withraw;

    /**
     * @return boolean
     */
    public function isPlanWithraw()
    {
        return $this->plan_withraw;
    }

    /**
     * @param boolean $plan_withraw
     *
     * @return this
     */
    public function setPlanWithraw($plan_withraw)
    {
        $this->plan_withraw = $plan_withraw;

        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="secret_option", type="integer", nullable=true)
     */
    private $secret_option;

    public function getSecretOption(){
        return $this->secret_option;
    }

    public function setSecretOption($secret_option)
    {
        $this->secret_option = $secret_option;
        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="plan_option", type="integer", nullable=true)
     */
    private $plan_option;

    public function getPlanOption(){
        return $this->plan_option;
    }

    public function setPlanOption($plan_option){
        $this->plan_option = $plan_option;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="ship", type="text", nullable=true)
     */
    private $ship;

    public function getShip(): ?string
    {
        log_info(
            'OrderItemExtension GET',
            [
                'ship' => $this->ship,
            ]
        );
        return $this->ship;
    }

    public function setShip(?string $ship): self
    {
        $this->ship = $ship;
        log_info(
            'OrderItemExtension SET',
            [
                'ship' => $ship,
            ]
        );
        return $this;
    }
}