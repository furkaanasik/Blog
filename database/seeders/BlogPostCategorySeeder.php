<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        BlogPost::all()->each(function ($blog_post) use ($categories){
            $blog_post->category()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
