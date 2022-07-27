<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'fullname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  bcrypt('admin123123'),
            'gender' => '1',
            'role' => '2',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [

                'fullname' => 'Nguyễn Văn Thế',
                'email' => 'the.nguyenvan@codecomplete.jp',
                'password' =>  bcrypt('user123123'),
                'gender' => '1',
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
