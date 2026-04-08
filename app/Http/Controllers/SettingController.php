<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()->paginate(15);
        return view('settings', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key|max:255',
            'value' => 'required|string',
            'type' => 'required|in:text,image,longtext',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil ditambahkan!');
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,'.$setting->id,
            'value' => 'required|string',
            'type' => 'required|in:text,image,longtext',
        ]);

        $setting->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil dihapus!');
    }
}
