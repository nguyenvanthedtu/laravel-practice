<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(30)->create()->each(function ($post){
            $randomFields = Category::all()->random(rand(1,4))->pluck('id');
            $post->categories()->attach($randomFields);
        });
    }
}
