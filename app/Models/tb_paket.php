<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_paket extends Model
{
    use HasFactory;
    protected $table = 'tb_paket';
    public $timestamps = false;
    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'harga'
    ];

    function paket(){
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }
}
