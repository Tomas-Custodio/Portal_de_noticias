<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUser;

class EnviarNotificacoes implements ShouldQueue
{
    
    public  object $admins;
    public  object $new_user;

    public function __construct(object $admins, object $new_user)
    {
        $this->admins = $admins;
        $this->new_user = $new_user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::send($this->admins, new NewUser($this->new_user));
    }
}
