@extends('layout.app')
@section('content')

    <main>
        <div class="article_grid">
            @foreach ($articles as $article)
            <div class="article">
                <img class="article_image" src="{{ $article->image }}" alt="">
                <div class="article_info">
                    <h2 class="article_title">
                        {{ $article['id'] }}. <a href="/articles/{{ $article['id'] }}">{{ $article['name'] }}</a>
                    </h2>
                    <time>{{ $article['published'] }}</time>
                    <p>{{ $article['description'] }}</p>
                </div>
                <form method="POST" action="/articles/{{ $article->id }}">
                    @csrf
                    @method('delete')
                    <a class="form__button" href="/articles/{{ $article['id'] }}/edit">Edit</a>
                    <input class="form__button error" type="submit" value="Delete">
                </form>
            </div>
            @endforeach
        </div>
        <div class="container">
            <a class="form__button primary" href="articles/create">New article</a>
        </div>
    </main>
@endsection
