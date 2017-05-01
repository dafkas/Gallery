<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

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
        $gallery->timestamps = false;
        $gallery->save();

        return redirect()->action('GalleryController@index');
    }
    
    public function showGallery($id)
    {
        $gallery = gallery::find($id);
        return view ('gallery.gallery')->with('gallery', $gallery);
    }

    public function delete()
    {

    }
}
