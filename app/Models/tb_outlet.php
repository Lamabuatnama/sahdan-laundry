<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_outlet extends Model
{
    use HasFactory;
    protected $table = 'tb_outlet';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'alamat',
        'tlp'
    ];
    public function paket(){
        return $this->hasMany(tb_paket::class);
    }
}
