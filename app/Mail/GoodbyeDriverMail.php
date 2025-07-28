<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class GoodbyeDriverMail extends Mailable
{
    public function build()
    {
        return $this->subject('Спасибо за работу в нашей компании!')
            ->view('emails.goodbye');
    }
}
