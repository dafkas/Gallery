<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = array();
    //disable timestamps
    public $timestamps = false;
}
