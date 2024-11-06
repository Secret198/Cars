@extends('layouts.app')

@section('content')
    <h1>Szín szerkesztése</h1>
    <form action="{{route("updateColors", $color->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$color->name}}">

        <label for="hexCode">Hex kód</label>
        <input type="text" id="hexCode" name="hexCode" value="{{$color->hexa_code}}">
        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection