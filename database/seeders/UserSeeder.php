<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "maged",
            "email" => "maged@yahoo.com",
            "password"=> Hash::make("123456")
        ]);

        DB::table("users")->insert([
            "name" => "adel",
            "email" => "adel@yahoo.com" ,
            "password" => "123456"
        ]);
    }
}
