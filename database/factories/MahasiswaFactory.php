<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 1;

        return [
            'nama' => $this->faker->name,
            'nim' => $this->faker->unique()->numerify('##########'), // Contoh format NIM
            'nohp' => $this->faker->phoneNumber,
            'matakuliah' => $this->faker->randomElement(['Pemrograman Berbasis Web', 'Struktur Data', 'Kewirausahaan', 'Statistika', 'Algoritma']),
            'jam' => $this->faker->randomElement(['1 Jam Pelajaran', '2 Jam Pelajaran', '3 Jam Pelajaran', '4 Jam Pelajaran']),
            'saran' => $this->faker->sentence,
        ];
    }
}
