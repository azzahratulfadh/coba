<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' =>$this->faker->bothify('########'),
            'nama' =>$this->faker->name(),
            'jurusan_id' =>mt_rand(1,2),
            'email' =>$this->faker->email(),
            'telp' =>$this->faker->bothify('############'),
            'alamat' =>$this->faker->address()
        ];
    }
}
