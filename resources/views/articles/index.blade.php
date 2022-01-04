@extends('layout.app')
@section('content')

<div><a href="articles/create">Create a new article</a></div>
<h1>{{ $page_title }} ({{$articles->total()}})</h1>
<ul>
    @foreach ($articles as $article)
        <li>
            <img style="width:50px;height:50px;border-radius:50%;" src="{{ $article->image }}" alt="">
            <h2>
                {{ $article['id'] }}. <a href="/articles/{{ $article['id'] }}">{{ $article['name'] }}</a>
            </h2>
            <p>{{ $article['description'] }}</p>
            <p>{{ $article['published'] }}</p>
            <form method="POST" action="/articles/{{ $article->id }}">
                @csrf
                @method('delete')
                <a href="/articles/{{ $article['id'] }}/edit">Edit</a>
                <input type="submit" value="Delete">
            </form>
        </li>
    @endforeach
</ul>
{{ $articles->links() }}
@endsection