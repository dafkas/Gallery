<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'user_id'];

      public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getSingleGallery($id)
    {
        $gallery = Gallery::with('user')->where('id', $id)->first();
        $gallery->images = $this->getGalleryImageUrls($id, $gallery->id);
        return $gallery;
    }
    private function getGalleryImageUrls($id, $galleryId)
    {
        $files = DB::table('images')
            ->where('gallery_id', $id)
            ->join('files', 'files.id', '=', 'images.file_id')
            ->get();
            
        $finalData = [];
        foreach ($files as $key => $file) {
            $finalData[$key] = [
                'file_id' => $file->id,
                'created_at' => $file->created_at,
                'main' => env('S3_URL') . "http://localhost:8888/gallery/public/gallery/images/" . $file->file_name,
            ];
        }
        return $finalData;
    }
}
