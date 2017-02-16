<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $subject;
    public $body;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $subject, $body)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->name = $name;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@cheaptechgeek.com')
            ->view('email.contact_mail');
    }
}
