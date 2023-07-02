@extends('layouts.app')

@section('content')
<div class="card text-white mb-3">
    <div class="card-header bg-info">Dashboard</div>
    <div class="card-body text-dark">
        @if(session('notification'))
            <div class="alert alert-success">
                {{session('notification')}}
            </div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" readonly name="email" value="{{old('email',$user->email)}}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña <em>(Ingresar solo si se desea modificar)</em></label>
                <input type="text" class="form-control" name="password" value="{{old('password')}}">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info">Guardar usuario</button>
            </div>
        </form>

        <form action="/proyecto-usuario" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="project_id" class="form-control" id="select-project">
                        <option value="">Seleccione proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="level_id" class="form-control" id="select-level">
                        <option value="">Seleccione nivel</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block">Asignar proyecto</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects_user as $project_user)
                <tr>
                    <td>{{ $project_user->project->name }}</td>
                    <td>{{ $project_user->level->name }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
                        <a href="/proyecto-usuario/{{ $project_user->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection