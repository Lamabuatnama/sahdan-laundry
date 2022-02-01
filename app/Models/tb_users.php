<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_users extends Model
{
    use HasFactory;
    protected $table = 'tb_users';
    public $timestamps = false;
    protected $filelable = [
        'nama',
        'email',
        'password',
        'id_outlet',
        'role'
    ];
    function users(){
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }
}
