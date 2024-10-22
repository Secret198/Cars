@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route("storeMakers")}}" method="post">
            @csrf
            <label for="name">Név: </label>
            <input type="text" id="name" name="name">
            <button type="submit">Küldés</button>
        </form>
    </div>
@endsection