<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori_id' => Kategori::inRandomOrder()->first()->id ?? Kategori::factory()->create()->id,
            'nama_barang' => $this->faker->words(3, true),
            'harga_barang' => $this->faker->numberBetween(100000, 5000000),
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'foto_barang' => null,
        ];
    }
}
