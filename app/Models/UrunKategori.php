<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunKategori extends Model
{
    use HasFactory;
    protected $table='urun_kategori';
    public $guarded=[];
}
