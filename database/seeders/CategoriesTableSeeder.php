<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Наращивание']);
        Category::create(['name' => 'Реконструкция']);
    }
}
