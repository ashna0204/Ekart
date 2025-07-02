<?php

namespace Database\Seeders;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $childCategories =[
            ['subcategory_id'=> 1, 'name' => 'Formal Wear'],
            ['subcategory_id' => 1 ,'name' => 'Casual Wear'],
            ['subcategory_id' => 1, 'name' => 'Active Wear'],
            ['subcategory_id' => 1, 'name' => 'Foot wear'],
             ['subcategory_id'=> 2, 'name' => 'Formal Wear'],
            ['subcategory_id' => 2 ,'name' => 'Casual Wear'],
            ['subcategory_id' => 2, 'name' => 'Active Wear'],
            ['subcategory_id' => 2, 'name' => 'Foot wear'],
             ['subcategory_id'=> 3, 'name' => 'Girls Clothing'],
            ['subcategory_id' => 3 ,'name' => 'Boys Clothing'],
            ['subcategory_id' => 3, 'name' => 'Girls Footwear'],
            ['subcategory_id' => 3, 'name' => 'Boys Footwear'],
            
        ];

        foreach($childCategories as $childCategory){
            Childcategory::create($childCategory);
        }
    }
}
