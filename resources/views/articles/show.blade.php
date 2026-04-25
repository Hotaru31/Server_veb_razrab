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
        <a href="/articles">Назад к списку</a>

        @can('update', $article)
            | <a href="/articles/{{ $article->id }}/edit">Редактировать</a>
        @endcan
    </p>

    <hr>

    {{-- КОММЕНТАРИИ --}}
    <h2>Комментарии</h2>

    @forelse($article->comments as $comment)
        <div style="margin-bottom: 10px;">
            <strong>{{ $comment->user->name }}</strong>:
            {{ $comment->content }}

            {{-- Только модератор может удалить --}}
            @can('delete', $comment)
                <form action="/comments/{{ $comment->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button>Удалить</button>
                </form>
            @endcan
        </div>
    @empty
        <p>Комментариев пока нет</p>
    @endforelse

    <hr>

    {{-- ФОРМА ДОБАВЛЕНИЯ --}}
    @auth
        <h3>Добавить комментарий</h3>

        <form action="/articles/{{ $article->id }}/comments" method="POST">
            @csrf

            <textarea name="content" rows="4" cols="50"></textarea>

            @error('content')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            <br>

            <button type="submit">Отправить</button>
        </form>
    @else
        <p>Чтобы оставить комментарий — войдите в систему</p>
    @endauth
@endsection