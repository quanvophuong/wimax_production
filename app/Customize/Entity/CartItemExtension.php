<?php

declare(strict_types=1);

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\CartItem")
 */
trait CartItemExtension
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="ship", type="text", nullable=true)
     */
    private $ship;

    public function getShip(): ?string
    {
        log_info(
                'CartItemExtension GET',
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
                'CartItemExtension SET',
                [
                    'ship' => $ship,
                ]
            );
        return $this;
    }
}