<?php

namespace App\Http\Repositories;

use App\Models\Blog\Article;
use Illuminate\Contracts\Pagination\Paginator;

class ArticleRepository
{
    /**
     * @return Paginator
     */
    public function list(): Paginator
    {
        $fields = [
            'id',
            'author',
            'title',
            'brief'
        ];
        
        /** @var \Illuminate\Database\Eloquent\Builder $query*/
        $query = Article::withTrashed()->orderBy('createdAt', 'DESC');
        return $query->with(['user:id,name'])->select($fields)
            ->paginate(5);
    }

    /**
     * @param array<string, mixed> $model
     * @return Article
     */
    public function create(array $model): Article
    {
        $article = new Article($model);
        
        $article->save();

        return $article;
    }

    /**
     * @param string $id
     * @return Article
     */
    public function findById(string $id): Article
    {
        /** @var Article $eloquentModel */
        $eloquentModel = Article::withTrashed()->find($id);
        return $eloquentModel;
    }
}
