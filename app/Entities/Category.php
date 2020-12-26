<?php

namespace App\Entities;

use App\Entities\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsToMany(Article::class, 'article_category', 'category_id', 'article_id');
    }
}
