@extends('layouts.app')

@section('content')
    <h1>Gyártó szerkesztése</h1>
    <form action="{{route("updateTransmissions", $transmission->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$transmission->name}}">
        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection