@extends('layout.inner')
@section('content')
<main>
<form method="POST" action="/articles/{{$article->id}}">
    @method('PUT')
    @csrf
    <div>
        Name: <input type="text" name="name" value="{{$article->name}}">
    </div>
    <div>
        Desciption: <input type="text" name="description" value="{{$article->description}}">
    </div>
    <input type="submit" value="Update" class="form__button primary">
</form>
</main>
@endsection