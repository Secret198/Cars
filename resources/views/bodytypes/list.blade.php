@extends('layouts.app')

@section('content')
    <h1>Karosszériák</h1>
    <div class="container">
        <a class="order" href="{{route("createBodyTypes")}}">Új karosszéria</a>
        <h6>Rendezés</h6>
        <a class="order" href="{{route("getBodyTypes", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a class="order" href="{{route("getBodyTypes", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            
            <tbody>
                @foreach($bodyTypes as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       <td><a href="{{route("editBodyTypes", $entity->id)}}">Szerkesztés</a></td>
                       <td>
                            <form action="{{route("deleteBodyTypes", $entity->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Törlés</button>
                            </form>
                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$bodyTypes->links()}}
    </div>
@endsection