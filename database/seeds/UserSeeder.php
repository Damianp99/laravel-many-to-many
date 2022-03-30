<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $user = new User();
            $user->name = $faker->words(2, true);
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            $user->save();
        }
    }
}
