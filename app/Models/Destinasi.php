<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = ['id_kota_origin','id_service','id_kota_destinasi', 'id_kecamatan' , 'kode_destinasi' , 'harga' ];
}
