<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\User;
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
        $user_ids = User::pluck('id')->toArray();
        $tag_ids = Tag::pluck('id')->toArray();
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->tag_id = Arr::random($tag_ids);
            $post->user_id = Arr::random($user_ids);
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(20);
            $post->description = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(250, 250);
            $post->save();
        }
    }
}
