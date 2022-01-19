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
    <div>
        <select name="category" id="category">
        @foreach ($categories as $category)
        <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Update" class="form__button primary">
</form>
</main>
@endsection