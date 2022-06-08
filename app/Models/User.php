<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $guard = 'user';

    protected $fillable = ['nama_user', 'email', 'password', 'id_level' , 'alamat' , 'hp' , 'id_kota' , 'id_kecamatan'];

    public function level(){
        return $this->hasOne(Level::class,'id_level','id_level');
    }
    public function kota(){
        return $this->hasOne(Kota::class,'id_kota','id_kota');
    }
    public function kecamatan(){
        return $this->hasOne(Kecamatan::class,'id_kecamatan','id_kecamatan');
    }
}
