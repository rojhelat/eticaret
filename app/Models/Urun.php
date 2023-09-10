<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Urun extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='urun';
    protected $guarded = [];
    public function kategoriler(){
        return $this->belongsToMany('App\Models\Kategori','urun_kategori')->distinct()->get();
    }


    public function urunDetay()
    {
        return $this->hasOne(UrunDetay::class);
    }

}
