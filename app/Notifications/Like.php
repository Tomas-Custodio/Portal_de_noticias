<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Noticia;
use Illuminate\Support\Str;

class Like extends Notification
{
    use Queueable;

    # dados do usuario que reagiu no post , e o referido post
    public object $user;
     public object $noticia;  


    /**
     * Create a new notification instance.
     */
    public function __construct( object $noticia,object $user){
        
        $this->noticia = $noticia;
        $this->user = $user;
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
            'titulo' => " o usuario {$this->user->nome} 
             acabou de reagir com adoro a sua publicacao" . Str::limit($this->noticia->titulo,12),
            'url' => '',
        ];
    }
}
