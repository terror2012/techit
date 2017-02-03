<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('office@cheaptechgeek.com')
            ->view('email.reminder_message');
    }
}
