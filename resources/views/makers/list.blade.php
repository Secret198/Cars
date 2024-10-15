@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            
            <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection