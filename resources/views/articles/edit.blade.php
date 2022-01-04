@extends('layout.app')
@section('content')

<form method="POST" action="/articles/{{$article->id}}">
    @method('PUT')
    @csrf
    Name: <input type="text" name="name" value="{{$article->name}}">
    Desciption: <textarea name="description">{{$article->description}}</textarea>
    <input type="submit" value="Update">
</form>
@endsection