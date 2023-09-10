<?php

namespace Database\Factories;

use App\Models\Urun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UrunDetay>
 */
class UrunDetayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'urun_id'=>Urun::factory(),
            'goster_slider'=>rand(0,1),
            'goster_gunun_firsati'=>rand(0,1),
            'goster_one_cikan'=>rand(0,1),
            'goster_cok_satan'=>rand(0,1),
            'goster_indirimli'=>rand(0,1),
        ];
    }
}
