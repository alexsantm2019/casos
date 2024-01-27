@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenid@: {{ Auth::user()->name }}</div>

                <div class="card-body text-center ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <h3>Sistema de Casos Estudio Jurídico </h3>

                    {{ __('You are logged in!') }}

                    <h6>Por favor seleccione una opción del menú superior</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
