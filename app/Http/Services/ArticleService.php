<?php

namespace App\Http\Services;

use App\Http\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleService
{
    public function __construct(
        private readonly ArticleRepository $repository
    ) {   
    }
    
    public function getAllArticles()
    {
        $articles = $this->repository->list();

        return $articles;
    }

    public function getById(string $id)
    {
        $article = $this->repository->findById($id);

        if (empty($article)) {
           throw new NotFoundHttpException();
        }

        return $article;
    }

    public function create(array $data) {
        if (empty($data['author'])) {
            $data['author'] = Auth::id();
        }
        
        return $this->repository->create($data);
    }
}