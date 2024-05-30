<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wine;
use App\Functions\Helper;

class WineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];
        $data_str = file_get_contents('https://api.sampleapis.com/wines/reds', false, stream_context_create($options));
        $data = json_decode($data_str);

        foreach ($data as $wine) {

            $new_wine = new Wine();
            $new_wine->winery = $wine->winery;
            $new_wine->name = $wine->wine;
            $new_wine->slug = Helper::generateSlug($new_wine->name, Wine::class);
            $new_wine->rating_average = $wine->rating->average;
            $new_wine->rating_reviews = $wine->rating->reviews;
            $new_wine->location = $wine->location;
            $new_wine->image = $wine->image;

            $new_wine->save();
        }
    }

}
