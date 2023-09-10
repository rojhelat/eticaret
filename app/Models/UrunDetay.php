<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunDetay extends Model
{
    use HasFactory;

    protected $table='urun_detay';
    public $guarded=[];


    public function urun(){
        return $this->belongsTo(Urun::class,'urun_id','id');
    }
}
