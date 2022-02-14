<?php

namespace Database\Factories;

use App\Models\tb_outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

class tb_paketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_outlet  = tb_outlet::all();
        return [
            'id_outlet'=>$this->faker->randomElement($id_outlet),
            'jenis'=>$this->faker->randomElement(['bed_cover','kiloan','kaos','selimut']),
            'nama_paket'=>$this->faker->domainName(),
            'harga'=>$this->faker->randomNumber(2)
        ];
    }
}
