<?php

namespace Database\Factories;
use App\Models\Faktur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faktur>
 */
class FakturFactory extends Factory
{
    protected $model = Faktur::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $items = [
            [
                'nama_barang' => $this->faker->word(),
                'qty' => $this->faker->numberBetween(1, 10),
                'harga' => $this->faker->numberBetween(50000, 500000),
            ],
            [
                'nama_barang' => $this->faker->word(),
                'qty' => $this->faker->numberBetween(1, 10),
                'harga' => $this->faker->numberBetween(50000, 500000),
            ],
        ];
        $total_harga = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['qty'] * $item['harga']);
        }, 0);
        return [
            'user_id' => 1,
            'nomor_invoice' => 'INV-' . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8)),
            'items' => json_encode($items),
            'alamat_pengiriman' => $this->faker->address(),
            'kode_pos' => $this->faker->numerify('#####'),
            'total_harga' => $total_harga,
        ];
    }
}
