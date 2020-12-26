<?php

namespace App\Repositories;

use App\Entities\Article;
use App\Repositories\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function setModel(Article $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function store($data)
    {
        $this->model->title = $data['title'] ?? $this->model->title;
        $this->model->headline_photo = $data['headline_photo'] ?? $this->model->headline_photo;
        $this->model->isi = $data['content'] ?? $this->model->content;
        $this->model->save();
    }

    public function attachCategory($categories)
    {
        $this->model->categories->attach($categories);

        return $this;
    }

    public function find($id)
    {
        $this->model->find($id);

        return $this;
    }

    public function search($coloumn, $keyword)
    {
        $this->model->where($coloumn, 'like', '%'.$keyword.'%');

        return $this;
    }

    public function sort($coloumn = 'created_at', $order = 'DESC')
    {
        $this->model->orderBy($coloumn, $method);

        return $this;
    }

    public function hasCategory($categoryNames)
    {
        $this->model->whereHas('categories', function (Builder $query) {
            $query->where('name', $categoryNames);
        });
    }

    public function fetchAll()
    {
        return $this->model->get();
    }

    public function onlyOne() 
    {
        return $this->model->first();
    }

    public function delete()
    {
        $this->model->delete();

        return $this;
    }
}
