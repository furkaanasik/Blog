<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
        ]);
        $admin->role_as = 1;
        $admin->save();

        $sampleUser = User::factory()->create([
            'name' => 'sample',
            'email' => 'sample@example.com',
            'password' => Hash::make('123456')
        ]);

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(BlogPostCategorySeeder::class);
        $this->call(CommentSeeder::class);
    }
}
