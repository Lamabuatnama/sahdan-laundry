<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_inventaris extends Model
{
    use HasFactory;
    protected $table = 'barang_inventaris';
    protected $guarded = [
        'id'
    ];
}
