<?php

namespace Database\Seeders;
use App\Models\Colour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colours = [
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'Green'],
            ['name' => 'Black'],
            ['name' => 'White'],
            ['name' => 'Yellow'],
            ['name' => 'Pink'],
            ['name' => 'Purple'],
            ['name' => 'Orange'],
            ['name' => 'Gray']
        ];

        foreach ($colours as $colour) {
            Colour::create($colour);
        }
    }
}
