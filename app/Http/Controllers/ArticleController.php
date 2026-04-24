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
        return view('articles.create');
    }

    public function store(Request $request)
    {
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
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
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
        $article->delete();

        return redirect('/articles');
    }
}