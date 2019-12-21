<?php

namespace App\Http\Controllers\TestDI;

use App\DI\DiInterface;
use App\DI\SecondDI;
use App\Http\Controllers\Controller;

/**
 * Class DiController
 */
class DiController extends Controller
{
    public function store(SecondDI $secondDI, DiInterface $firstDI)
    {
        $secondDI->all();

        dd($firstDI->change(1500));
    }
}
