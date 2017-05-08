<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Input;
use App\Image;
use Session;

class File extends Model
{
    protected $fillable = ['file_name', 'mime_type', 'file_size', 'file_path'];

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image'))
        {
            if (Input::file('image')->isValid()) 
            {
                $file = $request->file('image');
                $extension = $request->file('image')->guessExtension();
                $fileName = uniqid() . '.' . $extension;
                $mimeType = $request->file('image')->getClientMimeType();
                $fileSize = $request->file('image')->getClientSize();
                $galleryId = $request->input('galleryId');
                Input::file('image')->move('gallery/images', $fileName); 

                $file = File::create([
                    'file_name' => $fileName,
                    'mime_type' => $mimeType,
                    'file_size' => $fileSize,
                    'file_path' => env('S3_URL') . "gallery_{$galleryId}/main/" . $fileName,
                ]);

                $image = new Image;
                $image->gallery_id = $galleryId;
                $image->file_id = $file->id;
                $image->save();

                return back();
            }
            else{
                echo "error";
            }
        }
        else{
            Session::flash('alert-danger', 'No file selected');
            return back();
        }
       
    }
}
