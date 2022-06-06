<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nama_user', 'email' , 'password', 'level' , 'alamat' , 'hp' , 'id_kota' , 'kecamatan'];
    // protected $table= 'users';
}
