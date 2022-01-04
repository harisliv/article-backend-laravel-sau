@extends('layout.app')
@section('content')

<div><a href="articles/create">Create a new article</a></div>
<h1>{{ $page_title }}</h1>
<ul>
    @foreach ($articles as $article)
        <li>
            <h2>
                {{ $article['id'] }}. <a href="/articles/{{ $article['id'] }}">{{ $article['name'] }}</a>
            </h2>
            <h2>
                <a href="/articles/{{ $article['id'] }}/edit">Edit</a>
            </h2>
            <p>{{ $article['description'] }}</p>
            <form method="POST" action="/articles/{{ $article->id }}">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </li>
    @endforeach
</ul>
{{ $articles->links() }}
@endsection