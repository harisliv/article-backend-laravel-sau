@extends('layout.app')
@section('content')

<h1>
    {{ $article->name }}
</h1>

<h6>
    {{ $article->description }}
</h6>

@endsection
