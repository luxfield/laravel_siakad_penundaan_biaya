<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\

        DB::table('users')->insert([
            'name' => 'HMSI',
            'email' => Str::random(10).'@gmail.com',
            'password' => '123',
            'status' => 'HMJ'
        ]);

        DB::table('users')->insert([
            'name' => 'Dosen',
            'email' => Str::random(10).'@gmail.com',
            'password' => '123',
            'status' => 'Dosen'
        ]);

        DB::table('users')->insert([
            'name' => 'Dekan',
            'email' => Str::random(10).'@gmail.com',
            'password' => '123',
            'status' => 'Dekan'
        ]);


    }
}
