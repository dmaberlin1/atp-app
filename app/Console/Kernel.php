<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\NotifyAdminDriverRetiredJob;

class Kernel extends ConsoleKernel
{
    /**
     * Зарегистрированные Artisan команды.
     *
     * @var array
     */
    protected $commands = [
        // сюда можно добавить свои команды, если будут
    ];

    protected array $routeMiddleware = [

        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    /**
     * Определение расписания команд.
     */
    public function schedule(Schedule $schedule): void
    {
        $schedule->job(new NotifyAdminDriverRetiredJob)->dailyAt('02:00');
    }

    /**
     * Регистрация команд приложения.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
