<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    protected $fillable = ['kota','lat','lng'];
    protected $table = "lokasi";
}
