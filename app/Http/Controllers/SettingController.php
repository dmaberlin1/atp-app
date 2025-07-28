<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function edit()
    {
        Gate::authorize('admin-only');
        $setting = Setting::firstOrCreate([]);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        Gate::authorize('admin-only');
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'work_hours' => 'nullable|string|max:255',
        ]);

        $setting = Setting::first();
        $setting->update($validated);

        return redirect()->back()->with('success', 'Настройки обновлены');
    }
}
