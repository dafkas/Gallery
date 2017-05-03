<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array();
    //disable timestamps
    public $timestamps = false;
}
