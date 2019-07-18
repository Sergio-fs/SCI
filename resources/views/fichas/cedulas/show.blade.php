@extends('layouts.app', ['activePage' => 'Cedulas', 'titlePage' => __('Manejo de cedulas')])

@section('content')
  <div class="content" id="app">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Vista preliminar') }}</h4>
              <p class="card-category"></p>
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
            </div>
            <div class="card">
                <div class="card-header card-header-icon card-header">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title"> Datos del reporte 
                  </h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Fecha del reporte ') }}</h6>
                              <h6>{{$cedula->fechaRep}}</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Fecha de desaparicion ') }}</h6>
                              <h6>{{$cedula->fechaDes}}</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Numero de cedula ') }}</h6>
                              <h6>{{$cedula->numeroCed}}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Municipio ') }}</h6>
                              <h6>{{$cedula->municipio->municipio." - ".$cedula->municipio->cabeceraMunicipal}}</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Region ') }}</h6>
                              <h6>{{$cedula->region->region }}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>  
              <div class="card">
                <div class="card-header card-header-icon card-header">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title"> Datos personales 
                  </h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <div class="card" style="width: 14rem;">
                            <img src="{{ asset('images')}}/{{$cedula->nombreArch}}" class="card-img-top" alt="..." width="250">
                            <div class="card-body">
                              <h6>Foto del desaparecido </h6>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Nombre ') }}</h6>
                              <h6>{{$cedula->nombres}}</h6>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Apellido paterno') }}</h6>
                              <h6>{{$cedula->apellidoPat}}</h6>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">{{ __('Apellido materno') }}</h6>
                              <h6>{{$cedula->apellidoMat}}</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="col">
                            <div class="card">
                              <div class="card-body">
                                <h6 class="card-title">{{ __('Edad') }}</h6>
                                <h6>{{$cedula->edad}}</h6>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-body">
                                <h6 class="card-title">{{ __('Estatura') }}</h6>
                                <h6>{{$cedula->estatura}}</h6>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-body">
                                <h6 class="card-title">{{ __('Peso') }}</h6>
                                <h6>{{$cedula->peso}}</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            <div class="card">
              <div class="card-header card-header-icon card-header">
                <div class="card-icon">
                  <i class="material-icons">lock</i>
                </div>
                <h4 class="card-title">Descripciones</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">{{ __('Media filiación') }}</h6>
                        <p>{{$cedula->mediaFil}}</p>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">{{ __('Vestimenta') }}</h6>
                        <p>{{$cedula->vestimenta}}</p>
                      </div>
                    </div>    
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">{{ __('Señas particulares ') }}</h6>
                        <p>{{$cedula->señasPar}}</p>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">{{ __('Ultimo avistamiento ') }}</h6>
                        <p>{{$cedula->ultimoAvi}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a  class="btn btn-success" href="{{ route('cedula.edit', $cedula->id) }}">Editar</a>
                <a  class="btn btn-danger" href="{{ route('cedula.pdf', $cedula->id) }}" target="_blank">PDF</a>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  @endsection
