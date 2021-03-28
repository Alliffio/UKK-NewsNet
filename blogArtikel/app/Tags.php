<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = "tags";

    public function posting(){
        return $this->belongsToMany('App\Posting');
    }
}
