<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i = 0; $i < 30; $i++) {
            $cat = Category::inRandomOrder()->first();

            $title = Str::random(20);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "Lorem ipsum dolor aut Lorem ipsum dolor aut Lorem ipsum dolor aut",
                'category_id' => $cat->id,
                'description' => "Lorem ipsum dolor aut Lorem ipsum dolor aut Lorem ipsum dolor aut",
                'posted' => "yes"
            ]);
        }
    }
}
