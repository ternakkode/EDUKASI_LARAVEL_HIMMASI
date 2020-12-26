<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\V1\Article\CreateRequest;
use App\Http\Requests\API\V1\Article\FetchRequest;
use App\Http\Requests\API\V1\Article\UpdateRequest;
use App\Http\Resources\API\V1\Article\ArticleDetailResource;
use App\Http\Resources\API\V1\Article\ArticleResource;
use App\Repositories\ArticleRepository;
use App\Services\Article\ArticleImageService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleImageService;
    private $articleRepository;

    public function __construct(
        ArticleImageService $articleImageService,
        ArticleRepository $articleRepository
    ) {
        $this->articleImageService = $articleImageService;
        $this->articleRepository = $articleRepository;
    }

    public function create(CreateRequest $request)
    {
        $articles = $request->only(['title', 'content']);
        $categories = $request->input('category');
        $headlinePhoto = $request->file('headline_photo');
        $articles['headline_photo'] = $this->articleImageService->handleUpload(
            $headlinePhoto,
            $articles['title']
        );

        $this->articleRepository->store($articles);
        $this->articleRepository->attachCategory($categories);
        $articleObj = $this->articleRepository->getModel();

        return api_success(new ArticleDetailResource($articleObj));
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

    public function update($id, UpdateRequest $articles)
    {
        $this->articleRepository->findByIdOrFail($id);
        $articles = $request->only(['title', 'content']);
        $categories = $request->input('category');
        $headlinePhoto = $request->file('headline_photo');
        $articles['headline_photo'] = $headlinePhoto ? $this->articleImageService->handleUpload(
            $headlinePhoto,
            $articles['title']
        ) : null;

        $this->articleRepository->store($articles);
        $this->articleRepository->detachCategory();
        $this->articleRepository->attachCategory($categories);
        $articleObj = $this->articleRepository->getModel();

        return api_success(new ArticleDetailResource($articleObj));
    }
}
