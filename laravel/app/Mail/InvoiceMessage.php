<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $amount;
    public $curr_time;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->curr_time = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('office@cheaptechgeek.com')
            ->view('email.invoice_mail');
    }
}
