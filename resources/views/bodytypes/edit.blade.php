@extends('layouts.app')

@section('content')
    <h1>Karosszéria szerkesztése</h1>
    <form action="{{route("updateBodyTypes", $bodyType->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$bodyType->name}}">
        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection