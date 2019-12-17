<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Test3Job implements ShouldQueue
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
        info($this->string);
    }
}
