<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
