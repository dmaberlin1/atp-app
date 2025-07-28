<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendGoodbyeEmailJob implements ShouldQueue
{
    use  Queueable;

    protected string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new GoodbyeDriverMail());
    }
}
