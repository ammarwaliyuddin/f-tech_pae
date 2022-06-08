<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    // use HasFactory;
    protected $table = "destinasis";
    protected $primaryKey ="id_destinasi";

    protected $fillable = ['id_kota_origin','id_kota_destinasi', 'id_kecamatan' , 'id_service' , 'kode_destinasi', 'harga' ];

    public function kota_origin(){
        return $this->belongsTo(Kota::class,'id_kota','id_kota_origin');
    }
    public function kota_destinasi(){
        return $this->belongsTo(Kota::class,'id_kota','id_kota_destinasi');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan','id_kecamatan');
    }
    public function service(){
        return $this->belongsTo(Service::class,'id_service','id_service');
    }
}
