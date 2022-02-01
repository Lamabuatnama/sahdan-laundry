<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    public $timestamps = false;
    protected $filelable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajat',
        'status',
        'dibayar',
        'id_user'
    ];
}
