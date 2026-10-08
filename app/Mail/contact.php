<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    public array $user =[]; 
    public function __construct( array $array_data)
    {
        $this->user = $array_data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(

            subject: $this->user['titulo'],
            replyTo: [new Address($this->user['email'], $this->user['nome'])], );

    }

    public function content(): Content {

        return new Content(
            view: 'Email.contato_mail',
        );
    }

   
}
