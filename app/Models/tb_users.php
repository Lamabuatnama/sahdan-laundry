<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'email',
        'password',
        'id_outlet',
        'role'
    ];
    function outlet(){
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }
}
