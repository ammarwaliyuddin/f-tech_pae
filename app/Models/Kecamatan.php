<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    // use HasFactory;

    protected $table = "kecamatans";
    protected $primaryKey ="id_kecamatan";
    protected $fillable = ['nama_kecamatan','id_kota' ];
    
    public function kota(){
        return $this->hasOne(Kota::class,'id_kota','id_kota');
    }
}
