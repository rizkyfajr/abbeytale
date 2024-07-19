<?php
namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::firstOrCreate([]); // Ambil pengaturan atau buat baru jika belum ada
        return view('backend.setting.setting', compact('settings'));
    }

    public function update(Request $request, $id = 1)
    {
        $settings = WebsiteSetting::findOrFail($id);
            dd($request->all());
            try {
                // Validasi data
                $validatedData = $request->validate([
                    'site_name'        => 'required|max:255',
                    'site_url'         => 'required|url|max:255',
                    'site_email'       => 'required|email|max:255',
                    'site_phone'       => 'required|max:255',
                    'address'          => 'required',
                    'logo'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'favicon'          => 'nullable|image|mimes:ico|max:2048',
                    // ... validasi field lainnya
                ]);

                // Handle pengunggahan file
                if ($request->hasFile('logo')) {
                    if ($settings->logo) {
                        Storage::delete($settings->logo);
                    }
                    $validatedData['logo'] = $request->file('logo')->store('public/logos');
                }

                if ($request->hasFile('favicon')) {
                    if ($settings->favicon) {
                        Storage::delete($settings->favicon);
                    }
                    $validatedData['favicon'] = $request->file('favicon')->store('public/favicons');
                }

                // Simpan pengaturan
                $settings->update($validatedData);

                return redirect()->route('website_settings.index')
                    ->with('success', 'Pengaturan website berhasil diperbarui!');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
        }}
