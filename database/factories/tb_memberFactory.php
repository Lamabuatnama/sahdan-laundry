<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use faker\Generator as faker;

class tb_memberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=>$this->faker->name(),
            'alamat'=>$this->faker->address(),
            'jenis_kelamin'=>$this->faker->randomElement(['L','P']),
            'tlp'=>$this->faker->phoneNumber()
        ];
    }
}
