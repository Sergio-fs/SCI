<div class="sidebar" data-color="green" data-background-color="orange" data-image="{{ asset('material') }}/img/LogoFGE.jpg"> 
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('FGE') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Principal') }}</p>
        </a>
      </li>
      @if(Auth::check() && Auth::user()->hasRole('admin'))
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Usuarios" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Usuarios">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil de usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Manejo de usuarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      <li class="nav-item {{ ($activePage == 'Cedulas' || $activePage == 'pre-ambar' || $activePage == 'ambar' || $activePage == 'alba' ) ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Fichas" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Fichas') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Fichas">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Cedulas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('cedula.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Cedulas') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'pre-ambar' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Alertas pre-amber') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'ambar' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Alertas amber') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'alba' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Alertas alba') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>