@extends('layouts.app')

@section('content')
    <h1>Autó szerkesztése</h1>
    <form action="{{route("updateCars", $car->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$car->name}}">


        {{-- Do the edit --}}
        <label for="makers">Gyártó</label>
            <select name="makers" id="makers">
                @foreach($carData["makers"] as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>

            <label for="transmissions">Váltók</label>
            <select name="transmissions" id="transmissions">
                @foreach($carData["transmissions"] as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>

            <label for="bodyTypes">Karosszéria típusok</label>
            <select name="bodyTypes" id="bodyTypes">
                @foreach($carData["bodyTypes"] as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>

            <label for="fuels">Üzemanyag típus</label>
            <select name="fuels" id="fuels">
                @foreach($carData["fuels"] as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>

            <label for="colors">Színek</label>
            <select name="colors" id="colors">
                @foreach($carData["colors"] as $data)
                    <option style="background-color:{{$data->hexa_code}}" value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection