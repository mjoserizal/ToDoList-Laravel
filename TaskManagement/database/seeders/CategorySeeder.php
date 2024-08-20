<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['To Do', 'In Progress', 'Completed'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
