@extends('layouts.app')

@section('content')
    <h1>Gyártók</h1>
    <div class="container">
        <a class="order" href="{{route("createMakers")}}">Új gyártó</a>
        <h6>Rendezés</h6>
        <a class="order" href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">Növekvő</a>
        <a class="order" href="{{route("getMakers", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gyártó név</th>
                    <th>Logó</th>
                </tr>
            </thead>
            <tbody>
                @foreach($makers as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       <td><img src="{{$entity->logo}}"></td> 
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
        {{$makers->links()}}
    </div>
@endsection