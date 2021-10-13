<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\TagRequest;
use App\Models\Article;
use App\Repository\ArticlesRepository;
use App\Repository\ArticlesRepositoryContract;
use App\Repository\TagsRepositoryContract;
use App\Services\TagsSynchronizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    protected $tagsSynchronizer;

    protected $articlesRepository;

    protected $tagsRepository;

    /**
     * @param TagsSynchronizer $tagsSynchronizer
     */
    public function __construct(TagsSynchronizer $tagsSynchronizer, ArticlesRepositoryContract $articlesRepository, TagsRepositoryContract $tagsRepository)
    {
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->articlesRepository = $articlesRepository;
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articlesRepository->allPublished();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(TagRequest $tagRequest, StoreArticleRequest $storeArticleRequest)
    {
        $validatedData = $storeArticleRequest->validated();

        $data = [
            'published_at' => $storeArticleRequest->getPublishedAt(),
            'slug' => Str::slug(request('title'), '-'),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'body' => $validatedData['body'],
        ];

        $this->articlesRepository->create($data);

        $article = $this->articlesRepository->findByTitle($validatedData['title']);

        $this->tagsSynchronizer->sync($tagRequest->getTags(), $article);

        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = $this->articlesRepository->find($article);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = $this->tagsRepository->inLine($article);
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(TagRequest $tagRequest, StoreArticleRequest $storeArticleRequest, Article $article)
    {
        $validatedData = $storeArticleRequest->validated();

        $data = [
            'published_at' => $storeArticleRequest->getPublishedAt(),
            'slug' => Str::slug(request('title'), '-'),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'body' => $validatedData['body'],
        ];

        $this->articlesRepository->update($data, $article);

        $this->tagsSynchronizer->sync($tagRequest->getTags(), $article);

        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article)
    {
        $this->articlesRepository->delete($article);

        return redirect(route('article.index'));
    }
}
