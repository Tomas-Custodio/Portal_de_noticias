<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact;
class EnviarEmail implements ShouldQueue
{
    use Dispatchable,Queueable;

    private array $user;

    /**
     * Create a new job instance.
     */
    public function __construct(array $dados)
    {
        $this->user = $dados;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('tomascustodio2004@gmail.com')->send( new contact($this->user));
    }
}
