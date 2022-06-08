<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id_transaksi']; 
    
    public function user_pengirim(){
        return $this->belongsTo(User::class,'id_pengirim','id_user');
    }
    public function user_penerima(){
        return $this->belongsTo(User::class,'id_penerima','id_user');
    }
    public function destinasi(){
        return $this->belongsTo(Destinasi::class,'id_destinasi','id_destinasi');
    }
    public function disposisi(){
        return $this->belongsTo(Disposisi::class,'id_disposisi','id_disposisi');
    }

}
