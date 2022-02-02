<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HotelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = "указать адрес действующей электронной почты";
        $subj = "Бронирование";
        $name = "Grand mini-hotel";

        
        return $this->view('mail.booking')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subj);
    }
}
