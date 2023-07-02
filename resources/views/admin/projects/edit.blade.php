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
                <label for="name">Nombre</label>
                <input type="name" class="form-control" name="name" value="{{old('name',$project->name)}}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" description="description" value="{{old('description',$project->description)}}">
            </div>
            <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input type="date" class="form-control" name="start" value="{{ old('start', $project->start)}}">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info">Guardar</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <p>Categorias</p>
                <form class="form-inline" action="/categorias" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" placeholder="Ingrese Nombre" name="name" class="form-control">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">Añadir</button>
                        </div>
                      </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-category="{{ $category->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg>
                                </button>
                                <a href="/categoria/{{ $category->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-md-6">
                <p>Niveles</p>
                <form class="form-inline" action="/niveles" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" placeholder="Ingrese Nombre" name="name" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Añadir</button>
                          </div>
                        </div>
                      </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($levels as $key => $level)
                        <tr>
                            <td>N{{ $key+1 }}</td>
                            <td>{{ $level->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-level="{{ $level->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg>
                                </button>
                                <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/categoria/editar" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id" value="">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nombre de la categoría</label>
                        <input type="text" class="form-control" name="name" id="category_name" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar nivel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/nivel/editar" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="level_id" id="level_id" value="">
                    <div class="mb-3">
                        <label for="level_name" class="form-label">Nombre del nivel</label>
                        <input type="text" class="form-control" name="name" id="level_name" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection