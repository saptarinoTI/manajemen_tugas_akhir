<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    public function uploadFile($request, $name, $file_directory, $file_name)
    {
        $file_request = $request->file($name);
        $extension = $file_request->extension();
        $save_file = $file_request->storeAs($file_directory, $file_name . '.' . $extension, 'public');
        return $save_file;
    }

    public function deleteFile($file_name)
    {
        $file = File::delete('storage/' . $file_name);
        return $file;
    }
}
