<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nama_user', 'password', 'level' , 'alamat' , 'hp' , 'kota' , 'kecamatan'];
}
