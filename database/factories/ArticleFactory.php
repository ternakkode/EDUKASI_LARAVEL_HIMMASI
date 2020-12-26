<?php

use App\Entities\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'headline_photo' => articleUrl($faker->md5.'.jpg'),
        'content' => $faker->paragraph()
    ];
});
