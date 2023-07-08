<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
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
        $this->call(KategoriSeeder::class, false, ["path" => "database/data/1-kategoris.csv", "model" => Kategori::class]);
        $this->call(JenisSeeder::class, false, ["path" => "database/data/2-jenises.csv", "model" => Jenis::class]);
        $this->call(ProdukSeeder::class, false, ["path" => "database/data/3-produks.csv", "model" => Produk::class]);
        $this->call(UserSeeder::class, false, ["path" => "database/data/4-users.csv", "model" => User::class]);
    }
}
