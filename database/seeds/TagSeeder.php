<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_names = ['Healthy', 'IntoTheNature', 'Relaxing', 'GoodVibes', 'Friends', 'Sea', 'Tasty', 'Happiness', 'Stars'];
        foreach ($tag_names as $name) {
            $tag = new Tag();
            $tag->label = $name;
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}