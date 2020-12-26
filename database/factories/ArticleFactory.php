<?php

use App\Entities\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'headlie_photo' => 'public/storage/images/article/headline/'.$faker->md5.'.jpg',
        'content' => $faker->paragraphs(5)
    ];
});
