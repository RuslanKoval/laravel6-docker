<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $string;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       //throw new \Exception(11, 101);

        info($this->string);
        $message = $this->string;

        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
    }
}
