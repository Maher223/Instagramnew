<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $defaultImagePath = public_path('storage/uploads');

        for ($i = 0; $i < 10; $i++) {
            $caption = $faker->sentence;
            $image = $faker->image($defaultImagePath);

            DB::table('posts')->insert([
                'user_id' => 14,
                'caption' => $caption,
                'image' => 'uploads/' . $image,
            ]);
        }
    }
}
