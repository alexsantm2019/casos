@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h1><i class="fa fa-users" aria-hidden="true"></i>
                Lista de usuarios
            </h1>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success btn-sm mt-1 mb-3" href="{{ route('users.create') }}">
                <i class="fas fa-plus-circle"></i> Nuevo usuario
            </a>
        </div>

    </div>

    <div class="card shadow p-3">
        <div class="table-responsive">
            <table class="table  table-striped table-hover table-bordered table-sm align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Fecha de creación</th>
                        <th>Fecha actualización</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>{{ $user->photo }}
                        </td>
                        <td class="text-center">
                            {{--  @if($user->id === 1)  --}}
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                {!!
                                Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE','onsubmit'=>'return
                                confirm("Estas seguro que deseas eliminar?")'])!!}
                                <button type="submit" class=" ml-2 btn btn-danger btn-sm">Eliminar</button>
                                {!!Form::close()!!}
                            </div>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center w-100">
            {{$users->render()}}
            </div>
        </div>
    </div>
</div>

@endsection