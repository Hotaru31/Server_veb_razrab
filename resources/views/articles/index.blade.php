@extends('layout')

@section('title', 'Новости из базы')

@section('content')
    <h1>Новости из базы данных</h1>

    @foreach($articles as $article)
        <div>
            <h2>{{ $article->title }}</h2>

            <p>{{ $article->date }}</p>

            @if($article->preview_image)
                <img src="{{ asset($article->preview_image) }}" width="200">
            @endif

            <p>{{ $article->short_description }}</p>
        </div>

        <hr>
    @endforeach
@endsection