@extends('layouts.app')

@section('content')
    <h1>Szín hozzáadása</h1>
    <div class="container">
        <form action="{{route("storeColors")}}" method="post">
            @csrf
            <label for="name">Név: </label>
            <input type="text" id="name" name="name">

            <label for="hexCode">Hex kód</label>
            <input type="text" id="hexCode" name="hexCode">
            <button type="submit">Küldés</button>
        </form>
    </div>
@endsection