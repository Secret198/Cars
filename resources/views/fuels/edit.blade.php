@extends('layouts.app')

@section('content')
    <h1>Üzemanyag szerkesztése</h1>
    <div class="error">
        @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
        @endif
    </div> 
    <form action="{{route("updateFuels", $fuel->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$fuel->name}}">
        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection