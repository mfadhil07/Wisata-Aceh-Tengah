<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Daftar;
use GuzzleHttp\Promise\Create;
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
        // \App\Models\User::factory(10)->create();
        // Daftar::factory(5)->create();
        Daftar::factory(30)->create();
    }
}
