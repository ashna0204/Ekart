<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class categoryslugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $categories = DB::table('categories')->get();

        foreach ($categories as $category) {
            $slug = Str::slug($category->name);

            DB::table('categories')
                ->where('id', $category->id)
                ->update(['slug' => $slug]);
        }
    }
}
