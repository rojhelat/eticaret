<?php

namespace Database\Seeders;


use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS =0;');
        Urun::truncate();
        UrunDetay::truncate();

        Urun::factory(20)->has(\App\Models\UrunDetay::factory()->count(1))->create();

        DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
