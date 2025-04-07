<?php

namespace App\Http\Repositories;

use App\Models\Blog\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ArticleRepository
{
    public function list()
    {
        $fields = [
            'id',
            'author',
            'title',
            'brief'
        ];
        
        return Article::select($fields)->withTrashed()->with(['user:id,name'])
            ->paginate(5);
    }

    /**
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
    public function findById(string $id)
    {
        $eloquentModel = Article::withTrashed()->find($id);
        return $eloquentModel;
    }
}
