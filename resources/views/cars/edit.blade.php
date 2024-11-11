@extends('layouts.app')

@section('content')
    <div class="error">
        @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
        @endif
    </div>  
    @if(session("success"))
        <div class="success">
            {{session("success")}}
        </div>
    @endif
    <h1>Autó szerkesztése</h1>
    <form action="{{route("updateCars", $carData["car"]->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{$carData["car"]->name}}">


        <label for="makers">Gyártó</label>
        <select name="makers" id="makers">
            @foreach($carData["makers"] as $data)
                
                @if($carData["car"]->maker != null && $data->name == $carData["car"]->maker->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
                
            @endforeach
        </select>

        <label for="transmissions">Váltó</label>
        <select name="transmissions" id="transmissions">
            @foreach($carData["transmissions"] as $data)
                
                @if($carData["car"]->transmission != null && $data->name == $carData["car"]->transmission->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
                
            @endforeach
        </select>

        <label for="bodyTypes">Karosszéria</label>
        <select name="bodyTypes" id="bodyTypes">
            @foreach($carData["bodyTypes"] as $data)
               
                @if($carData["car"]->bodyType != null && $data->name == $carData["car"]->bodyType->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
            
            @endforeach
        </select>

        <label for="fuels">Üzemanyag típus</label>
        <select name="fuels" id="fuels">
            @foreach($carData["fuels"] as $data)
             
                @if($carData["car"]->fuel != null && $data->name == $carData["car"]->fuel->name)
                    <option value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endif
                
            @endforeach
        </select>

        <label for="colors">Szín</label>
        <select name="colors" id="colors">
            @foreach($carData["colors"] as $data)
               
                @if($carData["car"]->color != null && $data->name == $carData["car"]->color->name)
                    <option style="background-color:{{$data->hexa_code}}" value="{{$data->id}}" selected="true">{{$data->name}}</option>
                @else
                    <option style="background-color:{{$data->hexa_code}}" value="{{$data->id}}">{{$data->name}}</option>
                @endif
                
            @endforeach
        </select>

        <button type="submit">Szerkesztés</button>
    </form>
    
@endsection