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
        // Array to store used combinations
        $usedCombinations = [];

        for ($i = 0; $i < 1000; $i++) {
            do {
                $wine = Wine::inRandomOrder()->first();
                $flavour_id = Flavour::inRandomOrder()->first()->id;

                // Generate a unique key for the combination
                $combinationKey = $wine->id . '-' . $flavour_id;
            } while (isset($usedCombinations[$combinationKey]));

            // Store the combination as used
            $usedCombinations[$combinationKey] = true;

            // Attach flavour to wine
            $wine->flavours()->attach($flavour_id);
        }
    }
}
