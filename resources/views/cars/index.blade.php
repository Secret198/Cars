@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route("listCars")}}" method="GET">
            @csrf
            <select name="maker" id="maker">
                @foreach($makers as $entity)
                    <option value="{{$entity->id}}">{{$entity->name}}</option>
                @endforeach
            </select>

            <button type="submit">Ok</button>
        </form>
    </div>
@endsection