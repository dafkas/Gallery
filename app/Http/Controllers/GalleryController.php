<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Gallery;
use App\Image;



use Input;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = gallery::all();
        return view('home')->with('galleries', $galleries);
    }

    public function store(Request $request)
    {
        $gallery = new gallery();
        $gallery->name = Input::get('name');
        $gallery->save();

        return redirect()->action('GalleryController@index');
    }
    
    public function showGallery($id)
    {
        $gallery = gallery::find($id);
        $galleryObj = new Gallery;
        $images = $galleryObj->getSingleGallery($id);
        $galleryImages = [];
        foreach($images->images as $galleryImage)
        {     
            $galleryImages[] = $galleryImage['main'];
        }

        $galleryImages = array_reverse($galleryImages);

        
        $dataCollection = array('gallery' => $gallery, 'galleryImages' => $galleryImages);
        return view ('gallery.gallery')->with($dataCollection);

    }

    public function delete($id)
    {
        $gallery = gallery::find($id);
        $gallery->delete();
        return back();
    }
}
