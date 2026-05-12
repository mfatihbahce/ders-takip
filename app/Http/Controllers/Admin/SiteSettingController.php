<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        $setting = SiteSetting::firstOrCreate([]);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:30'],
        ]);

        $setting = SiteSetting::firstOrCreate([]);
        $setting->update($validated);

        return back()->with('success', 'Site ayarları kaydedildi.');
    }
}
