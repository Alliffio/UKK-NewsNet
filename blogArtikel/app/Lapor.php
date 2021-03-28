<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{

    public function tanggapan()
    {
       return $this->hasMany('App\Tanggapan');
    }
    
    protected $table = "lapor";
    protected $fillable = ['nama','email','tanggal','isi','file','lampiran'];

}
