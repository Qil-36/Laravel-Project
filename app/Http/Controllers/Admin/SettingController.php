<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
{
    $fields = [
        'store_name',
        'store_address',
        'store_logo',
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'whatsapp_number', // ✅ tambahkan ini
    ];

    foreach ($fields as $field) {
        \App\Models\Setting::set($field, $request->input($field));
    }

    return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
}

}
