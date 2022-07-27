<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'HTML/CSS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'Javascript',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'Reactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
