<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    "fullname" => "Administrator",
                    "email" => "admin@gmail.com",
                    "password" => Hash::make('12345678'),
                    "type" => "1",
                    "remember_token" => Str::random(10),
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "fullname" => "Project Manager",
                    "email" => "manager1@gmail.com",
                    "password" => Hash::make('12345678'),
                    "type" => "2",
                    "remember_token" => Str::random(10),
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "fullname" => "Owner Owner",
                    "email" => "owner1@gmail.com",
                    "password" => Hash::make('12345678'),
                    "type" => "0",
                    "remember_token" => Str::random(10),
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "fullname" => "Project Member",
                    "email" => "member1@gmail.com",
                    "password" => Hash::make('12345678'),
                    "type" => "3",
                    "remember_token" => Str::random(10),
                    "created_at" => now(),
                    "updated_at" => now()
                ]
            ]
        );
    }
}
