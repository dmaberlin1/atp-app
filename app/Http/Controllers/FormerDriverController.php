<?php

namespace App\Http\Controllers;

use App\Models\FormerDriver;

class FormerDriverController extends Controller
{
    public function index()
    {
        $formerDrivers = FormerDriver::orderByDesc('fired_at')->get();
        return view('former_drivers.index', compact('formerDrivers'));
    }
}
