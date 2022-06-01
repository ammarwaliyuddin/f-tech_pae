<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = ['kota_origin','kota_destinasi', 'nama_kecamatan' , 'kode_destinasi' , 'harga' ];
}
