<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $guard = 'petugas';

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = false;
    protected $fillable = [
        'username', 'password', 'nama_petugas', 'level'
    ];
    protected $hidden = [
        'password'
    ];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }
}
