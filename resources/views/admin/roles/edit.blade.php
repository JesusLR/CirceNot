@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('clientes.mesages')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Permisos de {{ $role->name }}</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-uppercase text-sm">Permisos asignados</p>
                                <div class="card shadow-sm">
                                    <form action="{{ route('admin_actualizar_permisos_perfiles', $role->id) }}"
                                        method="POST">
                                        <div class="card-body">

                                            @csrf
                                            @method('PUT')
                                            <ul class="list-group">
                                                @foreach ($permissions as $perm)
                                                    <li class="list-group-item list-group-item-action">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="permisos[]"
                                                                type="checkbox" value="{{ $perm->name }}"
                                                                id="{{ $perm->id }}}">
                                                            <label class="custom-control-label"
                                                                for="customCheck1">{{ $perm->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-danger mt-3">Quitar permisos</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <p class="text-uppercase text-sm">Permisos disponibles</p>

                                <div class="card shadow-sm">
                                    <form action="{{ route('admin_asignar_permisos_perfiles', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

                                            <ul class="list-group">
                                                @foreach ($permissionNotIncluded as $perm)
                                                    <li class="list-group-item list-group-item-action">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="permisos[]"
                                                                type="checkbox" value="{{ $perm->name }}"
                                                                id="{{ $perm->id }}}">
                                                            <label class="custom-control-label"
                                                                for="customCheck1">{{ $perm->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success mt-3">Asignar permisos</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Usuarios con rol {{ $role->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido(s) </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->cNombre }}</td>
                                            <td>{{ $user->cPrimerApellido }} {{ $user->cSegundoApellido }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
