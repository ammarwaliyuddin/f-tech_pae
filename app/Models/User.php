<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nama_user', 'email', 'password', 'id_level' , 'alamat' , 'hp' , 'id_kota' , 'id_kecamatan'];
}
