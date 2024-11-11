@extends('layouts.app')

@section('content')
    <h1>Üzemanyag hozzáadása</h1>
    <div class="container">
        <div class="error">
            @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
            @endif
        </div> 
        <form action="{{route("storeFuels")}}" method="post">
            @csrf
            <label for="name">Név: </label>
            <input type="text" id="name" name="name">
            <button type="submit">Küldés</button>
        </form>
    </div>
@endsection