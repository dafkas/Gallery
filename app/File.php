<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    protected $fillable = ['file_name', 'mime_type', 'file_size', 'file_path'];

    public function uploadImage(Request $request)
    {
        $file = $request->file('image');
        $extension = $request->file('image')->guessExtension();
        $filename = uniqid() . '.' . $extension;
        $mimeType = $request->file('image')->getClientMimeType();
        $fileSize = $request->file('image')->getClientSize();
       // $image = Image::make($file);
        $galleryId = $request->input('galleryId');

        $file = File::create([
            'file_name' => $filename,
            'mime_type' => $mimeType,
            'file_size' => $fileSize,
            'file_path' => env('S3_URL') . "gallery_{$galleryId}/main/" . $filename,
        ]);

         DB::table('images')->insert([
            'gallery_id' => $galleryId,
            'file_id' => $file->id,
        ]);
    }
}
