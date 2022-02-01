<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_detail_transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_transaksi';
    public $timestamps = false;
    protected $filelable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'keterangan'
    ];
}
