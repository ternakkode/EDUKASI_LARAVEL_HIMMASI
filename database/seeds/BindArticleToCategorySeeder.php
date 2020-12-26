<?php

use App\Entities\Article;
use App\Entities\Category;
use Illuminate\Database\Seeder;

class BindArticleToCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Article::all()->each(function ($article) use ($categories) { 
            $article->category()->attach(
                $categories->random(rand(1, 5))->pluck('id')->toArray()
            ); 
        });
    }
}
