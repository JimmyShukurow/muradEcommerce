<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
    public function run()
    {
        $this->call(RolesSeeder::class);
        Category::factory(10)->create();
        Product::factory(10)->create();
    }
}
