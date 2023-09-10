<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Urun>
 */
class UrunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $urun_adi = $this->faker->sentence(2);
        return [
            'urun_adi'=>$urun_adi,
            'slug'=>Str::slug($urun_adi,'_'),
            'aciklama'=>fake()->sentence(200),
            'fiyat'=>fake()->randomFloat(3,1,20)
        ];
    }
}
