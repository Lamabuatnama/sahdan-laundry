<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjemputan_laundry extends Model
{
    use HasFactory;
    protected $table    = 'penjemputan_laundry';
    public $timestamps = false;
    protected $guarded  = ['id','created_at','updated_at'];

    function member(){
        return $this->belongsTo(tb_member::class, 'id_member');
    }
}
