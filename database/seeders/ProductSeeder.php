<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=1;$i <= 20;$i++){
            Product::create([
                'name'=>$faker->words(3,true),
                'price'=>$faker->randomFloat(2,10,999),
                'subcategory_id'=>Subcategory::inRandomOrder()->first()->id,
                'status' => $faker->boolean(),
                'is_favourite'=>$faker->boolean()
            ]);
        }
    }
}
