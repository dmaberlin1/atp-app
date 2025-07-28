<?php

namespace App\Http\Controllers;

use App\Models\Driver;
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
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Водитель удалён');
    }
}
