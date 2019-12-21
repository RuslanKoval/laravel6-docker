<?php

namespace App\DI;

/**
 * Class SecondDI
 */
class SecondDI
{
    private $firstDI;

    public function __construct(DiInterface $firstDI)
    {
        $this->firstDI = $firstDI;
    }

    public function all()
    {
        $this->firstDI->setDiscount(500);

        return [
            '111',
            '222'
        ];
    }
}
