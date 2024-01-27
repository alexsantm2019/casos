@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h1>Lista de casos</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success btn-sm mt-1 mb-3" href="{{ route('casos.create') }}">
                <i class="fas fa-plus-circle"></i> Nuevo caso
            </a>
        </div>

    </div>

    <div class="card shadow p-3">
        <div class="table-responsive">
            <table class="table  table-striped table-hover table-bordered table-sm align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre del caso</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Autor</th>
                        <th>Fecha creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casos as $caso)
                    <tr>
                        <td>{{ $caso->id }}</td>
                        <td>{{ $caso->titulo }}</td>
                        <td>{{ $caso->descripcion }}</td>
                        <td>{{ $caso->nombre_estado }}</td>
                        <td>{{ $caso->nombre_usuario }}</td>
                        <td>{{ $caso->fecha_creacion }}
                        </td>
                        <td class="text-center">
                            @if(Auth::user() && $caso->users_id === Auth::user()->id)
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a class="btn btn-primary btn-sm" href="{{ route('casos.edit', $caso->id) }}">Edit</a>
                                {!!
                                Form::open(['route'=>['casos.destroy',$caso->id],'method'=>'DELETE','onsubmit'=>'return
                                confirm("Estas seguro que deseas eliminar?")'])!!}
                                <button type="submit" class=" ml-2 btn btn-danger btn-sm">Eliminar</button>
                                {!!Form::close()!!}
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center w-100">
            {{$casos->render()}}
            </div>
        </div>
    </div>
</div>

@endsection