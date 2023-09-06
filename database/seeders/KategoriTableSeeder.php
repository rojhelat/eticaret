<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->truncate();
        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'Elektronik','slug'=>'elektronik']);
        DB::table('kategori')->insert(['kategori_adi'=>'Televizyon','slug'=>'televizyon','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Tablet','slug'=>'tablet','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Bilgisayar','slug'=>'bilgisayar','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Cep Telefonu','slug'=>'cep-telefonu','ust_id'=>$id]);



        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'Kitap','slug'=>'kitap']);

        DB::table('kategori')->insert(['kategori_adi'=>'Savaş ve Barış','slug'=>'savas-ve-baris','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Anna Karina','slug'=>'anna-karina','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Sefiller','slug'=>'sefiller','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Kavgam','slug'=>'kavgam','ust_id'=>$id]);

        DB::table('kategori')->insert(['kategori_adi'=>'Dergi','slug'=>'dergi']);
        DB::table('kategori')->insert(['kategori_adi'=>'Mobilya','slug'=>'mobilya']);
        DB::table('kategori')->insert(['kategori_adi'=>'Dekorasyon','slug'=>'dekorasyon']);
        DB::table('kategori')->insert(['kategori_adi'=>'Kozmetik','slug'=>'kozmetik']);
        DB::table('kategori')->insert(['kategori_adi'=>'Kişisel Bakım','slug'=>'kisisel_bakim']);
        DB::table('kategori')->insert(['kategori_adi'=>'Giyim ve Moda','slug'=>'giyim_moda']);
        DB::table('kategori')->insert(['kategori_adi'=>'Anne ve Çocuk','slug'=>'anne_cocuk']);

    }
}
