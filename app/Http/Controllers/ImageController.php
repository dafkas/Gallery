<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\File;
use Input;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $galleryId = $request->input('galleryId');

        $file = new file;
        $fileUpload = $file->uploadImage($request);
        return response($fileUpload, 201);

    }
}
