<?php

namespace App\Http\Controllers;

use App\Jobs\SendGoodbyeEmailJob;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\DriverApplication;
use App\Models\FormerDriver;
use Illuminate\Http\Request;
use App\Services\DriverService;
use App\Http\Requests\StoreDriverRequest;

class DriverApplicationController extends Controller
{
    public function create()
    {
        return view('driver_app.apply-driver');
    }

    public function store(Request $request)
    {
        DriverApplication::create($request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'experience' => 'nullable|string',
        ]));

        return redirect()->back()->with('success', 'Заявка отправлена!');
    }

    public function index()
    {
        $this->authorize('viewAny', DriverApplication::class);
        return view('driver_app.index', [
            'applications' => DriverApplication::latest()->get()
        ]);
    }
}
