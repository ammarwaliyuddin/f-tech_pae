<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_disposisi' , 'id_user'];

    public function user(){
        return $this->hasOne(User::class,'id_user','id_user');
    }
}
