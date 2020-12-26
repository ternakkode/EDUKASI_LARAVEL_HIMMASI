<?php

namespace App\Repositories;

use App\Entities\Article;

interface ArticleRepositoryInterface
{
    public function setModel(Article $article);
    public function getModel();
    public function store($data);
    public function attachCategory($categories);
    public function find($id);
    public function search($coloumn, $keyword);
    public function sort($coloumn, $order);
    public function hasCategory($categoryNames);
    public function fetchAll();
    public function onlyOne();
    public function delete();
}
