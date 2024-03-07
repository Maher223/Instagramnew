<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the user seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

//        // Voeg een standaard gebruiker toe
//        DB::table('users')->insert([
//            'name' => 'Admin',
//            'email' => 'admin@example.com',
//            'username' => 'admin',
//            'password' => Hash::make('password'),
//        ]);

        // Voeg willekeurige gebruikers toe
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'username' => $faker->userName,
                'password' => 'password',
            ]);
        }
    }
}
