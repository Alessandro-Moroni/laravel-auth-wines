<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wine;
use Illuminate\Support\Str;

class WineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_str = file_get_contents('https://api.sampleapis.com/wines/reds');
        $data = json_decode($data_str);

        foreach ($data as $wine) {

            $new_wine = new Wine();
            $new_wine->winery = $wine->winery;
            $new_wine->name = $wine->wine;
            $new_wine->slug = $this->generateSlug($new_wine->name);
            $new_wine->rating_average = $wine->rating->average;
            $new_wine->rating_reviews = $wine->rating->reviews;
            $new_wine->location = $wine->location;
            $new_wine->image = $wine->image;

            $new_wine->save();
        }
    }

    private function generateSlug($sring)
    {
        $slug = Str::slug($sring, '-');
        $original_slug = $slug;

        $exist = Wine::where('slug', $slug)->first();
        $counter = 1;

        while ($exist) {
            $slug = $original_slug . '-' . $counter;
            $exist = Wine::where('slug', $slug)->first();
            $counter++;
        }
        return $slug;
    }
}
