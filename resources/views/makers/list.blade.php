@extends('layouts.app')

@section('content')

    <div class="container">
        <h6>Rendezés</h6>
        <a href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            
            <tbody>
                @foreach($makers as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       <td><img src="{{$entity->logo}}"></td>
                    </tr>
                @endforeach
                {{$makers->links()}}
            </tbody>
        </table>
    </div>
@endsection