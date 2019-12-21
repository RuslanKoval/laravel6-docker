<?php

namespace App\DI;


/**
 * Class FirstDI
 */
class FirstDI implements DiInterface
{
    public $currency;
    public $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function change($amount)
    {
        return [
          'amount' => $amount - $this->discount,
          'currency' => $this->currency,
          'discount' => $this->discount
        ];
    }
}
