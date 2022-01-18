@extends('layout.inner')
@section('content')

<form action="/articles" method="POST">
    @csrf
    <div>
        Name: <input type="text" name="name">
    </div>
    <div>
        Desciption: <input type="text" name="description" >
    </div>
    <input type="submit" value="Submit" class="form__button primary">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection