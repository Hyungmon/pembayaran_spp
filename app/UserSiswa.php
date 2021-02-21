<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserSiswa extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'user_siswa';

    protected $table = 'user_siswa';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'nisn', 'username', 'password', 'level'
    ];
    protected $hidden = [
        'password'
    ];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }
}
