<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wine;
use App\Models\Flavour;

class FlavourWineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 1000; $i++){
            $wine = Wine::inRandomOrder()->first();
            $flavour_id = Flavour::inRandomOrder()->first()->id;
            $wine->flavours()->attach($flavour_id);
        }
    }
}
