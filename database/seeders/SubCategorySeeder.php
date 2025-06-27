<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $subcategories = [
        'Fashion' => ['Womens Clothing','Men\'s Clothing', 'Kids wear'],
        'Electronics' => ['Mobiles', 'Laptops', 'Camera'],
        'Home & Kitchen' => ['Furniture', 'Fitness Equipment', 'Decor'],
        'Health & Beauty' => ['Sunscreen', 'Moisturizer', 'Serums'],
    ];

    foreach ($subcategories as $categoryName => $subs) {
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            echo "Category '$categoryName' not found. Skipping...\n";
            continue;
        }

        foreach ($subs as $subName) {
            Subcategory::create([
                'name' => $subName,
                'category_id' => $category->id,
            ]);
        }
    }
}

}
