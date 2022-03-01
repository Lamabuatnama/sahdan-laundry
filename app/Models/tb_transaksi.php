<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;
    protected $table    = 'tb_transaksi';
    public $timestamps = false;
    protected $guarded  = ['id','created_at','updated_at'];

    function member(){
        return $this->belongsTo(tb_member::class,'id_member');
    }
    function users(){
        return $this->belongsTo(user::class,'id_user');
    }
    function dt(){
        return $this->hasMany(tb_detail_transaksi::class,'id_transaksi');
    }
}
