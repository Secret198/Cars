@extends('layouts.app')

@section('content')
    <h1>Üzemanyagok</h1>
    <div class="container">
        <a class="order" href="{{route("createFuels")}}">Új váltó</a>
        <h6>Rendezés</h6>
        <a class="order" href="{{route("getFuels", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a class="order" href="{{route("getFuels", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            
            <tbody>
                @foreach($fuels as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       <td><a href="{{route("editFuels", $entity->id)}}">Szerkesztés</a></td>
                       <td>
                            <form action="{{route("deleteFuels", $entity->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Törlés</button>
                            </form>
                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$fuels->links()}}
    </div>
@endsection