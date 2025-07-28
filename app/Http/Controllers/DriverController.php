<?php

namespace App\Http\Controllers;

use App\Jobs\SendGoodbyeEmailJob;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\FormerDriver;
use Illuminate\Http\Request;
use App\Services\DriverService;
use App\Http\Requests\StoreDriverRequest;

class DriverController extends Controller
{
    public function __construct(private DriverService $service) {}

    public function index()
    {
        return view('drivers.index', ['drivers' => Driver::all()]);
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(StoreDriverRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('drivers.index')->with('success', 'Водитель добавлен');
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(StoreDriverRequest $request, Driver $driver)
    {
        $this->service->update($driver, $request->validated());
        return redirect()->route('drivers.index')->with('success', 'Водитель обновлен');
    }

    public function destroy(Driver $driver)
    {
        // Сохраняем в историю
        FormerDriver::create([
            'name' => $driver->name,
            'email' => $driver->email,
            'salary' => $driver->salary,
            'hired_at' => $driver->created_at,
            'fired_at' => now(),
        ]);

        // Отвязываем автобусы
        Bus::where('driver_id', $driver->id)->update(['driver_id' => null]);

        // Удаляем водителя
        $driver->delete();

        // Отложенное письмо на прощание
        SendGoodbyeEmailJob::dispatch($driver->email)->delay(now()->addDay());

        return redirect()->route('drivers.index')->with('success', 'Водитель удалён и перенесён в архив.');
    }
}
