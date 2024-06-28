<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name,
            'umur' => fake()->numberBetween(20, 60),
            'divisi' => fake()->randomElement(['IT', 'HR', 'Marketing']),
            'jabatan' => fake()->jobTitle,
            'alamat' => fake()->address,
            'nomor_telepon' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
        ];
    }
}
