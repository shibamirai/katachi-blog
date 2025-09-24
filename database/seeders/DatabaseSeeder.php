<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'is_admin' => true,
            'name' => env('MANAGER_NAME'),
            'email' => env('MANAGER_EMAIL'),
            'password' => Hash::make(env('MANAGER_PASSWORD')),
        ]);

        Category::create(['name' => '本校']);
        Category::create(['name' => '本町第２校']);
        Category::create(['name' => 'B型']);
        Category::create(['name' => '四ツ橋校']);
    }
}
