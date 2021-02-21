<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    //
    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany('App\Siswa', 'id_spp', 'id_spp');
    }
}
