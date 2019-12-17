<?php

namespace App\Http\Controllers;

use App\Jobs\Test2Job;
use App\Jobs\Test3Job;
use App\Jobs\TestJob;
use Illuminate\Http\Request;

/**
 * Class QueueController
 */
class QueueController extends Controller
{
    public function queue()
    {
        for ($i = 0; $i < 1 ; $i++) {
            TestJob::withChain([
                new Test2Job("------------------Test2Job\n\n"),
                new Test3Job("------------------Test3Job\n\n")
            ])->dispatch("------------------TestJob\n\n");
        }



//        TestJob::dispatch('test');
//        TestJob::dispatch('test2')->onQueue('test');
//        TestJob::dispatch('test3')->onQueue('test');
    }
}
