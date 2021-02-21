<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id_petugas');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'nisn', 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo('App\Spp', 'id_spp', 'id_spp');
    }
}
