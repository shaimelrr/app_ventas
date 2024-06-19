<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Electronics',
            'detail' => 'Category for electronic devices',
            'status' => 1, // Cambiamos 'active' por 1 para usar un booleano
        ]);

        Category::create([
            'name' => 'Clothing',
            'detail' => 'Category for clothing items',
            'status' => 1, // Cambiamos 'active' por 1 para usar un booleano
        ]);
    }
}
