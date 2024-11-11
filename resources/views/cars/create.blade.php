@extends('layouts.app')

@section('content')

    <div class="container">

    <div class="error">
        @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
        @endif
    </div>  
    <form action="{{route("storeCars")}}" method="post">
            @csrf
            <label for="name">Modell név </label>
            <input type="text" id="name" name="name">
            
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

            <button type="submit">Küldés</button>
        </form>
    </div>
    
@endsection