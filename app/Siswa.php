<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo('App\Spp', 'id_spp', 'id_spp');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'nisn', 'nisn');
    }
}
