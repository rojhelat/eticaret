<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kullanici extends Authenticatable
{

    protected $table='kullanici';
    use SoftDeletes;


    public function getAuthPassword()
    {
        return $this->sifre;
    }

    protected $fillable = [
        'adsoyad',
        'email',
        'sifre',
        'aktivasyon_anahtari',
        'aktif_mi',

    ];


    protected $hidden = [
        'sifre',
        'aktivasyon_anahtari',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
