<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index', ['settings' => Setting::all()]);
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        Setting::create($request->validate([
            'key' => 'required|unique:settings',
            'value' => 'required'
        ]));

        return redirect()->route('settings.index');
    }

    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->validate([
            'value' => 'required'
        ]));

        return redirect()->route('settings.index');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index');
    }
}
