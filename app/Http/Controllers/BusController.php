<?php
namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Brand;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Services\BusService;
use App\Http\Requests\StoreBusRequest;

class BusController extends Controller
{
    public function __construct(private BusService $service) {}

    public function index()
    {
        return view('buses.index', ['buses' => Bus::with(['brand', 'driver'])->get()]);
    }

    public function create()
    {
        return view('buses.create', [
            'brands' => Brand::all(),
            'drivers' => Driver::all()
        ]);
    }

    public function store(StoreBusRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('buses.index')->with('success', 'Автобус добавлен');
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', [
            'bus' => $bus,
            'brands' => Brand::all(),
            'drivers' => Driver::all()
        ]);
    }

    public function update(StoreBusRequest $request, Bus $bus)
    {
        $this->service->update($bus, $request->validated());
        return redirect()->route('buses.index')->with('success', 'Автобус обновлён');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'Автобус удалён');
    }
}
