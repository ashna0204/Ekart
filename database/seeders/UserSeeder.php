<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name'=>'admin']);
        Role::firstOrCreate(['name'=>'customer']);

        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin@123',
            'email' =>'admin@example.com',
            'password' => bcrypt('admin@123')
        ]);
        $admin->assignRole('admin');
    }
}
