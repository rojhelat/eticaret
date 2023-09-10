<?php

namespace Database\Seeders;

use App\Models\UrunKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrunKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UrunKategori::truncate();
        UrunKategori::factory(50)->create();
    }
}
