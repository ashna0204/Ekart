<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class subcategoryslugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $subcategories = DB::table('subcategories')->get();

        foreach ($subcategories as $subcategory) {
            $slug = Str::slug($subcategory->name);

            DB::table('subcategories')
                ->where('id', $subcategory->id)
                ->update(['slug' => $slug]);
        }
    }
}

