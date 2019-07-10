@extends('layouts.app', ['activePage' => 'Cedulas', 'titlePage' => __('Manejo de cedulas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Cedulas de identificacion') }}</h4>
                <p class="card-category"> {{ __('Hombres mayores de 18 años') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('cedula.create') }}" class="btn btn-sm btn-primary">{{ __('registrar cedula') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Fecha de reporte') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                    @if(empty($cedulas))
                        <p>No hay registros</p>
                    @else
                      @foreach($cedulas as $cedula)
                        <tr>
                          <td>
                            {{ $cedula->nombres }}
                          </td>
                          <td>
                            {{ $cedula->fechaRep }}
                          </td>
                          <td>
                            {{ $cedula->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('cedula.destroy', $cedula->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('cedula.edit', $cedula) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Confirmar para borrar registro") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                                  <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('cedula.pdf', $cedula->id) }}" data-original-title="" title="" target="_blank">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                              </form>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection