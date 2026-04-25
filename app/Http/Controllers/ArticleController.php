<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        //проверка прав на создание
        $this->authorize('create', Article::class);

        return view('articles.create');
    }

    public function store(Request $request)
    {
        //проверка прав на создание
        $this->authorize('create', Article::class);

        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'preview_image' => 'nullable|max:255',
            'short_description' => 'nullable|max:500',
            'description' => 'required|min:10',
            'date' => 'required|date',
        ]);

        Article::create($validated);

        return redirect('/articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        //проверка прав на редактирование
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        //проверка прав на редактирование
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'preview_image' => 'nullable|max:255',
            'short_description' => 'nullable|max:500',
            'description' => 'required|min:10',
            'date' => 'required|date',
        ]);

        $article->update($validated);

        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        //проверка прав на удаление
        $this->authorize('delete', $article);

        $article->delete();

        return redirect('/articles');
    }
}