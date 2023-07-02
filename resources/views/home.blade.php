@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
			@if (auth()->user()->is_support)
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Incidencias asignadas a mí</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Severidad</th>
                                    <th>Estado</th>
                                    <th>Fecha creación</th>
                                    <th>Título</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard_my_incidents">
                                @foreach ($my_incidents as $incident)
                                    <tr>
                                        <td>{{ $incident->id }}</td>
                                        <td>{{ $incident->category->name }}</td>
                                        <td>{{ $incident->severity_full }}</td>
                                        <td>{{ $incident->status}}</td>
                                        <td>{{ $incident->created_at }}</td>
                                        <td>{{ $incident->title_short }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Incidencias sin asignar</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Severidad</th>
                                    <th>Estado</th>
                                    <th>Fecha creación</th>
                                    <th>Título</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard_pending_incidents">
								@foreach ($pending_incidents as $incident)
                                    <tr>
                                        <td>{{ $incident->id }}</td>
                                        <td>{{ $incident->category->name }}</td>
                                        <td>{{ $incident->severity_full }}</td>
                                        <td>{{ $incident->id}}</td>
                                        <td>{{ $incident->created_at }}</td>
                                        <td>{{ $incident->title_short }}</td>
										<td>
											<a href="" class="btn btn-primary btn-sm">
												Atender
											</a>
										</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			@endif
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Incidencias reportadas por mí</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Severidad</th>
                                    <th>Estado</th>
                                    <th>Fecha creación</th>
                                    <th>Título</th>
                                    <th>Responsable</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard_by_me">
								@foreach ($incidents_by_me as $incident)
                                    <tr>
                                        <td>{{ $incident->id }}</td>
                                        <td>{{ $incident->category->name }}</td>
                                        <td>{{ $incident->severity_full }}</td>
                                        <td>{{ $incident->status}}</td>
                                        <td>{{ $incident->created_at }}</td>
                                        <td>{{ $incident->title_short }}</td>
										<td>
											{{$incident->support_id}}
										</td>
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
