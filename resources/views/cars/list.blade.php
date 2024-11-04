@extends('layouts.app')

@section('content')

    <div class="container">
        <a class="order" href="{{route("createMakers")}}">Új autó</a>
        <h6>Rendezés</h6>
        <a class="order" href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a class="order" href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            
            <tbody>
                @foreach($cars as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       <td><a href="{{route("editMakers", $entity->id)}}">Szerkesztés</a></td>
                       <td>
                            <form action="{{route("deleteMakers", $entity->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Törlés</button>
                            </form>
                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$cars->links()}}
    </div>
@endsection