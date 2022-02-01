<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_member extends Model
{
    use HasFactory;
    protected $table = 'tb_member';
    public $timestamps = false;
    protected $filelable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp'
    ];
}
