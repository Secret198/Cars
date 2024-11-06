@extends('layouts.app')

@section('content')
    <h1>Karosszéria hozzáadása</h1>
    <div class="container">
        <form action="{{route("storeBodyTypes")}}" method="post">
            @csrf
            <label for="name">Név: </label>
            <input type="text" id="name" name="name">
            <button type="submit">Küldés</button>
        </form>
    </div>
@endsection