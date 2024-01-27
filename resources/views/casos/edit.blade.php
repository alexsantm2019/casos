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
            <i class="fas fa-location-arrow"></i> Editar caso:  {{$casos->titulo}}
        </h3>

       
    </div>
</div>



{!! Form::open(['method' => 'PUT', 'route' => ['casos.update', $casos->id]]) !!}
    @include('casos/_form')
{!! Form::close() !!}
</div>
@endsection