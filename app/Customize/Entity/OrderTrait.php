<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\Order")
 */
trait OrderTrait
{
        /**
         * @var string
         *
         * @ORM\Column(name="imei", type="string", length=255, nullable=true)
         */
        private $imei;

    public function setImei($imei = null)
    {
        $this->imei = $imei;

        return $this;
    }

    public function getImei()
    {
        return $this->imei;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="price_id_change", type="string", length=255, nullable=true)
     */
    private $priceIdChange;

    public function setPriceIdChange($priceIdChange = null)
    {
        $this->priceIdChange = $priceIdChange;

        return $this;
    }

    public function getPriceIdChange()
    {
        return $this->priceIdChange;
    }

}
