<?php

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
        $categories = [
            ['label' => 'FOOD', 'color' => 'warning'],
            ['label' => 'TRAVEL', 'color' => 'info'],
            ['label' => 'ECONOMY', 'color' => 'danger'],
            ['label' => 'SPORT', 'color' => 'success'],
            ['label' => 'PHOTOGRAPHY', 'color' => 'primary'],
            ['label' => 'NATURE', 'color' => 'secondary'],
            ['label' => 'ANIMALS', 'color' => 'dark'],
            ['label' => 'SPACE', 'color' => 'light'],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category;
            $newCategory->label = $category['label'];
            $newCategory->color = $category['color'];
            $newCategory->save();
        }
    }
}
