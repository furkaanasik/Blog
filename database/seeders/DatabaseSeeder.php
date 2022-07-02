<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//        $admin = \App\Models\User::factory()->create([
//            'name' => 'admin',
//            'email' => 'admin@admin.com',
//            'password' => '123456'
//        ]);
//        $admin->role_as = 1;
//        $admin->save();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(BlogPostCategorySeeder::class);
        $this->call(CommentSeeder::class);
    }
}
