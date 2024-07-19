<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //Setting Banner
    public function indexBanner() {
        $banners = Banner::all();

        return view('backend.setting.banner.index', compact('banners'));
    }

    public function createBanner(){
        return view('backend.setting.banner.create');
    }

    public function editBanner($id){

        $banner = Banner::findOrFail($id);

        return view('backend.setting.banner.update', compact('banner'));
    }

    public function storeBanner(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'active' => 'boolean',
        ]);
        // Simpan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $validatedData['image'] = $imagePath;
        }
        // dd($validatedData);

        $banner = Banner::create($validatedData);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambahkan!');
    }


    public function updateBanner(Request $request, $id){

        $banner = Banner::findOrFail($id);

        // Validasi input (mirip dengan storeBanner)
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'active' => 'boolean',
        ]);


        if ($request->hasFile('image')) {

            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('banners', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update data banner
        $banner->update($validatedData);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil diperbarui!');
    }

    public function destroyBanner(Banner $banner)
    {

        if (Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus!');
    }




}
