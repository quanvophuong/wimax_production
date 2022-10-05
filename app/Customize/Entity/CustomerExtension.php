<?php

declare(strict_types=1);

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerExtension
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="card_number", type="string", nullable=true)
     */
    private $card_number;

    public function getCardNumber(): ?string
    {
        return $this->card_number;
    }

    public function setCardNumber(?string $card_number): self
    {
    log_info(
                    'CustomerExtension SET',
                    [
                        'card_number' => $this->card_number,
                    ]
                );
        $this->card_number = $card_number;
        return $this;
    }

     /**
         * @var int|null
         *
         * @ORM\Column(name="card_year", type="string", nullable=true)
         */
        private $card_year;

        public function getCardYear(): ?string
        {
            return $this->card_year;
        }

        public function setCardYear(?string $card_year): self
        {
            $this->card_year = $card_year;
            return $this;
        }

        /**
                 * @var int|null
                 *
                 * @ORM\Column(name="card_month", type="string", nullable=true)
                 */
                private $card_month;

                public function getCardMonth(): ?string
                {
                    return $this->card_month;
                }

                public function setCardMonth(?string $card_month): self
                {
                    $this->card_year = $card_month;
                    return $this;
                }

                /**
                                 * @var string|null
                                 *
                                 * @ORM\Column(name="card_owner", type="string", nullable=true)
                                 */
                                private $card_owner;

                                public function getCardOwner(): ?string
                                {
                                    return $this->card_owner;
                                }

                                public function setCardOwner(?string $card_owner): self
                                {
                                    $this->card_year = $card_owner;
                                    return $this;
                                }

                                /**
                                                                 * @var int|null
                                                                 *
                                                                 * @ORM\Column(name="card_cvc", type="string", nullable=true)
                                                                 */
                                                                private $card_cvc;

                                                                public function getCardCvc(): ?string
                                                                {
                                                                    return $this->card_cvc;
                                                                }

                                                                public function setCardCvc(?string $card_cvc): self
                                                                {
                                                                    $this->card_year = $card_cvc;
                                                                    return $this;
                                                                }
}