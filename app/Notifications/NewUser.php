<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification{

    use Queueable;

    public object $user;


    public function __construct( object  $newuser) {

        $this->user = $newuser;
    }
  
    public function via(object $notifiable): array {

        return ['database'];
    }

    public function toArray(object $notifiable): array {

        return [
            'titulo' => "O usuario {$this->user->nome} acabou de ser criado pelo admin".Auth::user()->nome,
            'url' => route('users.dashboard')
            ];
        }

}
