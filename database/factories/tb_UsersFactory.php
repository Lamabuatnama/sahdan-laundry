<?php

namespace Database\Factories;

use App\Models\tb_outlet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class tb_UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_outlet  = tb_outlet::all();
        $asd = bcrypt('asd');
        $aaa = bcrypt('aaa');
        return [
            'nama'=>$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password'=> $this->faker->randomElement([$asd,$aaa]),
            'id_outlet'=>$this->faker->randomElement($id_outlet),
            'role'=>$this->faker->randomElement(['admin','kasir','owner'])
        ];
    }
}
