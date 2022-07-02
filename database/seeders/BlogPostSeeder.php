<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogPost::factory()->times(100)->create();
    }
}
