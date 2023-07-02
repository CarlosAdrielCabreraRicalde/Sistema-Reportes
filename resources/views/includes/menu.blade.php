<br>
<div class="card text-white mb-3">
  <div class="card-header bg-info">Menú</div>
  <div class="card-body text-info">
    <ul class="list group">
        @if(auth()->check())
            <li class="list-group-item mb-4"><a href="/home">Dashboard</a></li>
            @if(!auth()->user()->is_client)
            <li class="list-group-item mb-4"><a href="">Ver incidencias</a></li>
            @endif
            <li class="list-group-item mb-4"><a href="reportar">Reportar incidencias</a></li>


            @if(auth()->user()->is_admin)
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administración
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
                <li><a class="dropdown-item" href="proyectos">Proyectos</a></li>
                {{--<li><a class="dropdown-item" href="/config">Configuracion</a></li>--}}
              </ul>
            </div>
            @endif
        @else
            <li class="list-group-item mt-4"><a href="">Bienvenido</a></li>
            <li class="list-group-item mt-4"><a href="">Instrucciones</a></li>
            <li class="list-group-item mt-4"><a href="">Créditos</a></li>
        @endif
    </ul>
  </div>
</div>