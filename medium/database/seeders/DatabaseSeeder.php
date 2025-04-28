<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $categories=[
            'Education',
            'Tech',
            'Coding',
            'News',
        ];
        // foreach ($categories as $category) {
        //     category::create(['title'=>$category]);
        // }
        post::factory(100)->create();
    }
}
