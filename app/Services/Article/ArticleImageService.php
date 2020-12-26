<?php

namespace App\Services\Article;

use Illuminate\Support\Facades\Storage;

class ArticleImageService
{
    CONST DEFAULT_DIRECTORY = 'public/images/article/headline/';

    private $file;
    private $name;

    public function handleUpload($file, $title)
    {
        self::setFile($file);
        self::generateNameByTitle($title);
        self::store();
        return self::getName();
    }

    public function store()
    {
        $this->file->storeAs(self::DEFAULT_DIRECTORY, $this->name);
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFile($file) 
    {
        return $this->file;
    }

    public function generateNameByTitle($title)
    {
        $name = strtolower($title);
        $name = str_replace(' ','-',$name);
        $name = str_replace('.', '', $name);
        $name .= '.'.$this->file->extension();
        $this->name = $name;
    }

    public function setName()
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
