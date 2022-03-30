<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(20);
            $post->description = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(250, 250);
            $post->save();
        }
    }
}
