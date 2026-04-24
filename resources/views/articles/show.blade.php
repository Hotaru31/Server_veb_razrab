@extends('layout')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>

    <p>{{ $article->date }}</p>

    @if($article->preview_image)
        <img src="{{ asset($article->preview_image) }}" width="300">
    @endif

    <p>{{ $article->description }}</p>

    <p>
        <a href="/articles">Назад к списку</a> |
        <a href="/articles/{{ $article->id }}/edit">Редактировать</a>
    </p>
@endsection