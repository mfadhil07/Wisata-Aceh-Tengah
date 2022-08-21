<?php

namespace Database\Factories;

use App\Models\Daftar;
use Illuminate\Database\Eloquent\Factories\Factory;

class DaftarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Daftar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' =>  $this->faker->name(),
            'kecamatan' => $this->faker->city(),
            'kampung' => $this->faker->streetAddress(),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
            'longitute' => $this->faker->longitude($min = -180, $max = 180)
        ];
    }
}
