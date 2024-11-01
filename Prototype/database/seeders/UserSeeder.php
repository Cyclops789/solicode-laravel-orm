<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => "author",
                'email' => "author@gmail.com",
                'password' => '12345678'
            ]
        ])->each(function ($user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => \Hash::make($user['password']),
            ]);
        });
    }
}
