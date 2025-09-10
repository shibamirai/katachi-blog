<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'ボウ氏',
            'email' => 'contact@miraino-katachi.co.jp',
        ]);

        Category::create(['name' => '本校']);
        Category::create(['name' => '本町第２校']);
        Category::create(['name' => 'B型']);
        Category::create(['name' => '四ツ橋校']);
    }
}
