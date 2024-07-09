<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;


class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'Green'],
            ['name' => 'Yellow'],
            ['name' => 'Orange'],
            ['name' => 'Purple'],
            ['name' => 'Pink'],
            ['name' => 'Black'],
            ['name' => 'White'],
            ['name' => 'Brown'],
            // Add more colors as needed
        ];

        // Insert data into the colors table
        Color::insert($colors);
    }
}
