<?php

namespace App\Jobs;

use App\Models\Driver;
use App\Models\FormerDriver;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyAdminDriverRetiredJob implements ShouldQueue
{
    use  Queueable;

    protected string $email;

    public function handle()
    {
        $drivers = Driver::all();

        foreach ($drivers as $driver) {
            if ($driver->birthdate && now()->diffInYears($driver->birthdate) >= 65) {
                FormerDriver::create($driver->toArray());
                $driver->delete();

                // notify admin
                \Mail::raw("Водитель {$driver->name} уволен по возрасту", function ($msg) {
                    $msg->to('admin@example.com')->subject('Автоматическое увольнение');
                });
            }
        }
    }
}
