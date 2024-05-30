<?php

namespace Database\Seeders;

use App\Models\Flavour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;


class FlavourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $flavours = json_decode(file_get_contents(__DIR__ . '/aromi-vini.json'));

        foreach ($flavours->aromi as $flavour) {
            $new_flavour = new Flavour();
            $new_flavour->name = $flavour;
            $new_flavour->slug = Helper::generateSlug($new_flavour->name, Flavour::class);
            $new_flavour->save();
        }
    }

}
