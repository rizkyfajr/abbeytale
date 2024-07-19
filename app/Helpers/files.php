<?php

// app/Helpers/files.php

use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_file')) {
    function upload_file($file, $path = 'uploads')
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $path . '/' . $fileName;
    }
}

if (!function_exists('delete_file')) {
    function delete_file($filePath)
    {
        Storage::disk('public')->delete($filePath);
    }
}

if (!function_exists('get_file_url')) {
    function get_file_url($filePath)
    {
        return Storage::disk('public')->url($filePath);
    }
}
