<?php


namespace App\DI;


interface DiInterface
{
    public function setDiscount($amount);
    public function change($amount);
}
