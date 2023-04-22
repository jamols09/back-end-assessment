<?php

namespace App\Services;

use App\Models\EmailAttachment;
use Illuminate\Support\Facades\Storage;

class EmailAttachmentService
{
    public function storeFile($name, $request, $path): void
    {
        $file = $request->file('file');
        Storage::putFileAs($path, $file, $name);
    }

    public function saveRecord($original_name, $file_name, $path): void
    {
        EmailAttachment::create([
            'original_name' => $original_name,
            'file_name' => $file_name,
            'path' => $path,
        ]);
    }
}
