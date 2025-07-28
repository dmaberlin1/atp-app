<?php

// app/Console/Commands/NotifyDriversSalaryCommand.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Driver;
use Illuminate\Support\Facades\Mail;

class NotifyDriversSalaryCommand extends Command
{
    protected $signature = 'notify:salary';
    protected $description = 'Уведомить всех водителей об их зарплате';

    public function handle()
    {
        Driver::each(function ($driver) {
            if ($driver->email && $driver->salary) {
                Mail::raw("Ваша зарплата: {$driver->salary}", function ($msg) use ($driver) {
                    $msg->to($driver->email)->subject('Информация о зарплате');
                });
            }
        });

        $this->info('Уведомления отправлены');
    }
}

