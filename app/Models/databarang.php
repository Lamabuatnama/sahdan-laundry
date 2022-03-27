<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class databarang extends Model
{
    use HasFactory;
    protected $table    = 'databarang';
    public $timestamps = false;
    protected $guarded  = ['id','created_at','updated_at'];
}
