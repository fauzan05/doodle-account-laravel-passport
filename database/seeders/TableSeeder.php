<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Buat 10 pengguna
    $users = User::factory(10)->create();
    $categories = Category::factory(5)->create();

    foreach ($users as $user) {
        foreach($categories as $category) {
            Todo::factory()
                ->create([
                    'user_id' => $user->id,
                    'category_id' => $category->id
                ]);
        }
    }

    }
}
