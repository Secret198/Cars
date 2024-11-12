@extends('layouts.app')

@section('content')

    @if($errors->any())
    <div class="error">
        {{ implode('', $errors->all(':message')) }}
    </div> 
    @endif
        
@endsection