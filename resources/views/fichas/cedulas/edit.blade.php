@extends('layouts.app', ['activePage' => 'Cedulas', 'titlePage' => __('Manejo de cedulas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" action="{{ route('cedula.update', $cedula->id) }}" autocomplete="off" class="form-horizontal" id="usrform" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Vista de edición') }}</h4>
                <p class="card-category"></p>
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
                    <label class="col-sm-2 col-form-label">Foto del desaparecido</label>
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <img src="{{ asset('images') }}/{{$cedula->nombreArch}}" alt="..." width="200">
                        </div>
                        <div class="col">
                          <label class="col-form-label">{{ __('Nombre ') }}</label>
                          <input type="text" name="nombres" class="form-control" value="{{$cedula->nombres}}" >
                          <label class="col-form-label">{{ __('Apellido paterno') }}</label>
                          <input type="text" name="apellidoPat" class="form-control" value="{{$cedula->apellidoPat}}" >
                          <label class="col-form-label">{{ __('Apellido materno') }}</label>
                          <input type="text" name="apellidoMat" class="form-control"value="{{$cedula->apellidoMat}}">
                        </div>
                        <div class="col">
                          <label class="col-form-label">{{ __('Fecha del reporte ') }}</label>
                          <input type="text" name="fechaRep" class="form-control" value="{{$cedula->fechaRep}}" >
                          <label class="col-form-label">{{ __('Fecha de desaparición') }}</label>
                          <input type="text" name="fechaDes" class="form-control" value="{{$cedula->fechaDes}}" >
                          <label class="col-form-label">{{ __('Numero de cedula') }}</label>
                          <input type="text" name="numeroCed" class="form-control"value="{{$cedula->numeroCed}}">
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
                      <label class="col-form-label">{{ __('Media filiación ') }}</label>
                      <textarea class="form-control" name="mediaFil" id="input-mediaFil" placeholder="{{ __('...') }}" required="true" aria-required="true" rows="4" cols="50"  form="usrform" >{{$cedula->mediaFil }}</textarea>
                      <label class="col-form-label">{{ __('Vestimenta ') }}</label>
                      <textarea class="form-control" name="vestimenta" id="input-vestimenta" placeholder="{{ __('...') }}"required="true" aria-required="true" rows="4" cols="50"  form="usrform" >{{$cedula->vestimenta }}</textarea>      
                    </div>
                    <div class="col">
                      <label class="col-form-label">{{ __('Señas particulares ') }}</label>
                      <textarea class="form-control" name="señasPar" id="input-señasPar" placeholder="{{ __('...') }}" value="" required="true" aria-required="true" rows="4" cols="50"  form="usrform" >{{$cedula->señasPar}}</textarea>
                      <label class="col-form-label">{{ __('Ultimo avistamiento ') }}</label>
                      <textarea class="form-control" name="ultimoAvi" id="input-ultimoAvi" placeholder="{{ __('...') }}" value="" required="true" aria-required="true" rows="4" cols="50"  form="usrform" >{{$cedula->ultimoAvi}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                <button class="btn btn-success">Guardar cambios</button>
                
              </div>
              </div>
            </form>
          </div>  
        </div>
      </div>
    </div>
  </div>
  @endsection
