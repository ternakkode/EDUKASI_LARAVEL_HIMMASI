<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Article\FetchRequest;
use App\Http\Resources\API\V1\Article\ArticleDetailResource;
use App\Http\Resources\API\V1\Article\ArticleResource;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(
        ArticleRepository $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }

    public function index(FetchRequest $request)
    {
        $articles = $this->articleRepository;
        if ($category = $request->input('category')) {
            $articles = $articles->hasCategory($category);
        }

        if ($search = $request->input('search')) {
            [$coloumn, $keyword] = splitInput($search);
            $articles = $articles->search($coloumn, $keyword);
        }

        if ($sort = $request->input('sort')) {
            $order = $sort == 'latest' ? 'asc' : 'desc';
            $articles = $articles->sort('created_at', $order);
        }

        $articles = $articles->fetchAll();
        if (!$articles->isEmpty()) {
            return api_success(ArticleResource::collection($articles));
        } else {
            return api_error('data not found');
        }
    }

    public function detail($id)
    {
        $articles = $this->articleRepository->findById($id)->onlyOne();
        
        if ($articles) {
            return api_success(new ArticleDetailResource($articles));
        } else {
            return api_error('data not found');
        }
    }
}
