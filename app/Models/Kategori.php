<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='kategori';
    public $timestamps = true;
    protected $fillable = ['kategori_adi','slug'];
    public function urunler(){

        return $this->belongsToMany('App\Models\Urun','urun_kategori');
    }
}
