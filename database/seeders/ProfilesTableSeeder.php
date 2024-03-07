<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $users = User::all();

        foreach ($users as $user) {
            $paragraph = $faker->paragraph;

            DB::table('profiles')->insert([
                'user_id' => $user->id,
                'title' => $faker->title,
                'description' => $paragraph,
            ]);
        }
    }
}
