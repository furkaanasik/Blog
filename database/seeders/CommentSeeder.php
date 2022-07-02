<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::factory()->times(400)->create();
    }
}
