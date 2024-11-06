@extends('layouts.app')

@section('content')
    <h1>Autó szerkesztése</h1>
    <form action="{{route("updateCars", $carData["car"]->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$carData["car"]->name}}">


        {{-- Do the edit --}}
        <label for="makers">Gyártó</label>
        <select name="makers" id="makers">
            @foreach($carData["makers"] as $data)
                @if($data->name == $carData["car"]->maker->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
            @endforeach
        </select>

        <label for="transmissions">Váltó</label>
        <select name="transmissions" id="transmissions">
            @foreach($carData["transmissions"] as $data)
                @if($data->name == $carData["car"]->transmission->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
            @endforeach
        </select>

        <label for="bodyTypes">Karosszéria</label>
        <select name="bodyTypes" id="bodyTypes">
            @foreach($carData["bodyTypes"] as $data)
                @if($data->name == $carData["car"]->bodyType->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
            @endforeach
        </select>

        <label for="fuels">Üzemanyag típus</label>
        <select name="fuels" id="fuels">
            @foreach($carData["fuels"] as $data)
                @if($data->name == $carData["car"]->fuel->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
            @endforeach
        </select>

        <label for="colors">Szín</label>
        <select name="colors" id="colors">
            @foreach($carData["colors"] as $data)
                @if($data->name == $carData["car"]->color->name)
                    <option style="background-color:{{$data->hexa_code}}" value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option style="background-color:{{$data->hexa_code}}" value="{{$data->id}}">{{$data->name}}</option>
                @endif
            @endforeach
        </select>

        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection