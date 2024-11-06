@extends('layouts.app')

@section('content')
    <h1>Autó modellek</h1>
    <div class="container">
        <a class="order" href="{{route("createCars")}}">Új autó</a>
        <h6>Rendezés</h6>
        @if($cars[0])
            <a class="order" href="{{route("listCars", ["sort_by" => "name", "sort_dir" => "asc", "maker" => $cars[0]->maker->id])}}" title="ABC">Növekvő</a>
            <a class="order" href="{{route("listCars", ["sort_by" => "name", "sort_dir" => "desc", "maker" => $cars[0]->maker->id])}}" title="ZYX">Csökkenő</a>
        @else
             <a class="order" href="{{route("listCars", ["sort_by" => "name", "sort_dir" => "asc" ])}}" title="ABC">Növekvő</a>
            <a class="order" href="{{route("listCars", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">Csökkenő</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modell név</th>
                    <th>Gyártó név</th>
                    <th>Váltó típus</th>
                    <th>Karosszéria típus</th>
                    <th>Üzemanyag</th>
                    <th>Szín</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>

                        @if(!$entity->name)
                            <td>-</td>
                        @else
                            <td>{{$entity->name}}</td>
                        @endif

                        @if(!$entity->maker)
                            <td>-</td>
                        @else
                            <td>{{$entity->maker->name}}</td>
                        @endif

                        @if(!$entity->transmission)
                            <td>-</td>
                        @else
                            <td>{{$entity->transmission->name}}</td>
                        @endif

                        @if(!$entity->bodyType)
                            <td>-</td>
                        @else
                            <td>{{$entity->bodyType->name}}</td>
                        @endif

                        @if(!$entity->fuel)
                            <td>-</td>
                        @else
                            <td>{{$entity->fuel->name}}</td>
                        @endif

                        @if(!$entity->color)
                            <td>-</td>
                        @else
                            <td style="background-color:{{$entity->color->hexa_code}}">{{$entity->color->name}}</td>
                        @endif

                       <td><a href="{{route("editCars", $entity->id)}}">Szerkesztés</a></td>
                       <td>
                            <form action="{{route("deleteCars", $entity->id)}}" method="post">
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