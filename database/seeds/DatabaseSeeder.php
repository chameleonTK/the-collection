<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection("users")->delete();
        DB::collection("preferences")->delete();
        DB::collection("collections")->delete();
        DB::collection("items")->delete();

        $this->call(\App\Seeder\BoardGameSeeder::class);
        $this->call(\App\Seeder\UserSeeder::class);
        $this->call(\App\Seeder\CollectionSeeder::class);
        $this->call(\App\Seeder\PreferenceSeeder::class);
    }
}
