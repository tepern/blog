<?php

namespace App\Http\Services;

use App\Http\Repositories\ArticleRepository;
use App\Models\Blog\Article;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Exception;

class ArticleService
{
    public function __construct(
        private readonly ArticleRepository $repository
    ) {   
    }
    
    /**
     * @return Paginator
     */
    public function getAllArticles(): Paginator
    {
        $articles = $this->repository->list();

        return $articles;
    }
    
    /**
     * @param string $id
     * @return Article
     */
    public function getById(string $id): Article
    {
        $article = $this->repository->findById($id);
        if (!$article) {
           throw new NotFoundHttpException();
        }

        return $article;
    }
    
    /**
     * @param array<string, int> $data
     * @return Article
     */
    public function create(array $data): Article {
        if (empty($data['author'])) {
            $data['author'] = Auth::id();
        }
        
        return $this->repository->create($data);
    }
}