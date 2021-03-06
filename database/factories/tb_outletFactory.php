<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class tb_outletFactory extends Factory
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
            'tlp'=>$this->faker->phoneNumber()
        ];
    }
}
