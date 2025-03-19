<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Faktur;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Kategori::factory(5)->create();
        Barang::factory(20)->create();
        Faktur::factory(10)->create();
    }
}
