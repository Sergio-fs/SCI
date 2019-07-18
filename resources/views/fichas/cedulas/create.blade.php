@extends('layouts.app', ['activePage' => 'Cedulas', 'titlePage' => __('Manejo de cedulas')])

@section('content')
  <div class="content" id="app">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" action="{{ route('cedula.store') }}"  class="form-horizontal" id="usrform" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Registrar nueva cedula') }}</h4>
                <p class="card-category"></p>
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
                          <label class="col-form-label">{{ __('Fecha del reporte ') }}</label>
                          <input type="date" name="fechaRep" class="form-control" >
                        </div>
                        <div class="col-sm">
                          <label class="col-form-label">{{ __('Fecha de desaparición') }}</label>
                          <input type="date" name="fechaDes" class="form-control"  >
                        </div>
                        <div class="col-sm">
                          <label class="col-form-label">{{ __('Numero de cedula') }}</label>
                          <input type="text" name="numeroCed" class="form-control">
                        </div>
                      </div>
                      <option-municipio-region></option-municipio-region>
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
                    <label class="col-sm-2 col-form-label">Foto del desaparecido</label>
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <image-input-component name="foto" id="input-foto"></image-input-component>
                        </div>
                        <div class="col">
                          <label class="col-form-label">{{ __('Nombre ') }}</label>
                          <input type="text" name="nombres" class="form-control" >
                          <label class="col-form-label">{{ __('Apellido paterno') }}</label>
                          <input type="text" name="apellidoPat" class="form-control">
                          <label class="col-form-label">{{ __('Apellido materno') }}</label>
                          <input type="text" name="apellidoMat" class="form-control">
                        </div>
                        <div class="col">
                          <label class="col-form-label">{{ __('Edad ') }}</label>
                          <input type="number" name="edad" class="form-control" >
                          <label class="col-form-label">{{ __('Estatura') }}</label>
                          <input type="number" name="estatura" class="form-control"  >
                          <label class="col-form-label">{{ __('Peso') }}</label>
                          <input type="number" name="peso" class="form-control">
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
                      <textarea class="form-control" name="mediaFil" id="input-mediaFil" placeholder="{{ __('Máximo 445 caracteres') }}" required="true" aria-required="true" rows="4" cols="50"  form="usrform"  maxlength="445"></textarea>
                      <label class="col-form-label">{{ __('Vestimenta ') }}</label>
                      <textarea class="form-control" name="vestimenta" id="input-vestimenta" placeholder="{{ __('Máximo 170 caracteres') }}"required="true" aria-required="true" rows="4" cols="50"  form="usrform" maxlength="170" ></textarea>      
                    </div>
                    <div class="col">
                      <label class="col-form-label">{{ __('Señas particulares ') }}</label>
                      <textarea class="form-control" name="señasPar" id="input-señasPar" placeholder="{{ __('Máximo 250 caracteres') }}" required="true" aria-required="true" rows="4" cols="50"  form="usrform" maxlength="250"></textarea>
                      <label class="col-form-label">{{ __('Ultimo avistamiento ') }}</label>
                      <textarea class="form-control" name="ultimoAvi" id="input-ultimoAvi" placeholder="{{ __('Máximo 250 caracteres') }}"  required="true" aria-required="true" rows="4" cols="50"  form="usrform" maxlength="250"></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                <button class="btn btn-success">Guardar</button>
              </div>
              </div>
            </form>
          </div>  
        </div>
      </div>
    </div>
  </div>
  @endsection
