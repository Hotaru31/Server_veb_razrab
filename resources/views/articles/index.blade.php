@extends('layout')

@section('title', 'Новости')

@section('content')
    <h1>Новости</h1>

    {{-- Показываем только модератору --}}
    @can('create', App\Models\Article::class)
        <p>
            <a href="/articles/create">Создать статью</a>
        </p>
    @endcan

    @foreach($articles as $article)
        <div>
            <h2>
                <a href="/articles/{{ $article->id }}">
                    {{ $article->title }}
                </a>
            </h2>

            <p>{{ $article->date }}</p>

            @if($article->preview_image)
                <img src="{{ asset($article->preview_image) }}" width="200">
            @endif

            <p>{{ $article->short_description }}</p>

            <a href="/articles/{{ $article->id }}">Подробнее</a>

            {{-- Только модератор может редактировать --}}
            @can('update', $article)
                | <a href="/articles/{{ $article->id }}/edit">Редактировать</a>
            @endcan

            {{-- Только модератор может удалять --}}
            @can('delete', $article)
                <form action="/articles/{{ $article->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Удалить</button>
                </form>
            @endcan
        </div>

        <hr>
    @endforeach

    <div style="margin-top: 20px;">
        @if ($articles->previousPageUrl())
            <a href="{{ $articles->previousPageUrl() }}">← Назад</a>
        @endif

        <span>
            Страница {{ $articles->currentPage() }} из {{ $articles->lastPage() }}
        </span>

        @if ($articles->nextPageUrl())
            <a href="{{ $articles->nextPageUrl() }}">Вперёд →</a>
        @endif
    </div>
@endsection