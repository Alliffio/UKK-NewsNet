<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    
    public function pengaduan()
    {
      return $this->belongsTo('App\Lapor');
    }
    
    protected $table = "tanggapan";
    protected $fillable = ['tanggal','nama_pelapor','email_pelapor','isi_tanggapan','id_petugas'];


}
