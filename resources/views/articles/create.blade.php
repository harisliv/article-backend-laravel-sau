@extends('layout.app')
@section('content')

<form action="/articles" method="POST">
    @csrf
    <div>
        Name: <input type="text" name="name" value="SomeValue">
    </div>
    <div>
        Desciption: <textarea name="description">SomeDescription</textarea>
    </div>
    <input type="submit" value="Submit">
</form>

@endsection