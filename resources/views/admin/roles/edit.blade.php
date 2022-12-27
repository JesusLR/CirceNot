@extends('layouts.app')
@section('content')
    <div class="container-fluid">
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
                                <form action="" method="POST">
                                    @method('PUT')
                                    <ul class="list-group">
                                        @foreach ($permissions as $perm)
                                            <li class="list-group-item list-group-item-action">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $perm->name }}" id="{{ $perm->id }}}"
                                                        @if ($role->hasPermissionTo($perm->name)) checked @endif>
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $perm->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <p class="text-uppercase text-sm">Permisos disponibles</p>
                                <form action="" action="POST">
                                    @method('PUT')
                                    <ul class="list-group">
                                        @foreach ($permissionNotIncluded as $perm)
                                            <li class="list-group-item list-group-item-action">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $perm->name }}" id="{{ $perm->id }}}">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $perm->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios con rol {{$role->name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Identificador</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Personas Autorizadas con rol {{$rol->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
