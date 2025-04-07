<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Http\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct (
        private readonly ArticleService $service
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = $this->service->getAllArticles();
        
        return view('blog.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        return view('blog.article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->input();

        $article = $this->service->create($data);

        if ($article) {
            return redirect()->route('article.show', [$article->id])
            ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = $this->service->getById($id);
        return view('blog.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
