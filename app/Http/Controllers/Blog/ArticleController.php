<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Services\ArticleService;
use Illuminate\Contracts\View\View as View;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    public function __construct (
        private readonly ArticleService $service
    ) {
    }
    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index(): View|Factory
    {
        $articles = $this->service->getAllArticles();
        
        return view('blog.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        $article = new Article();
        return view('blog.article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $data = $request->all();

        try {
            $article = $this->service->create($data);
            return Redirect::route('article.show', [$article->id])
            ->with(['success' => 'Успешно сохранено']);
        } catch (\Throwable $th) {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
        
    /**
     * Display the specified resource.
     * @param string $id
     * @return Factory|View
     */
    public function show(string $id): Factory|View
    {
        $article = $this->service->getById($id);
        return view('blog.article.show', compact('article'));
    }
}
