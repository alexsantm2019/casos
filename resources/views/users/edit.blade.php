@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">
            <a href="{{ URL::previous() }}" class="text-info btn" data-toggle="tooltip" data-placement="top"
                title="Back">
                <i class="fas fa-chevron-left"></i>
            </a>
            <i class="fas fa-location-arrow"></i> Editar usuario:  {{$users->name}}
        </h3>

       
    </div>
</div>



{!! Form::open(['method' => 'PUT', 'route' => ['users.update', $users->id]]) !!}
    @include('users/_form')
{!! Form::close() !!}
</div>
@endsection