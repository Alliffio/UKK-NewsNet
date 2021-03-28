<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = "category";

    public function posting(){
        return $this->hasMany('App\Posting');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
