@extends('layouts.app')

@section('content')
    <h1>Színek</h1>
    <div class="container">
        
        <a class="order" href="{{route("createColors")}}">Új Szín</a>
        <h6>Rendezés</h6>
        <a class="order" href="{{route("getColors", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a class="order" href="{{route("getColors", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            
            <tbody>
                @foreach($colors as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                        <td style="background-color:{{$entity->hexa_code}}">{{$entity->hexa_code}}</td>
                       <td><a href="{{route("editColors", $entity->id)}}">Szerkesztés</a></td>
                       <td>
                            <form action="{{route("deleteColors", $entity->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Törlés</button>
                            </form>
                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$colors->links()}}
    </div>
@endsection