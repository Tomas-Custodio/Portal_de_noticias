<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Cadastro extends Notification {

    use Queueable;

    public object $user;

    /**
     * Create a new notification instance.
     */
    public function __construct( object $new_user)
    {
        $this->user = $new_user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

            'titulo' => "O usuario {$this->user->nome} acabou de se registrar no site",
            'url' => route('users.dashboard') ];
        }
}

