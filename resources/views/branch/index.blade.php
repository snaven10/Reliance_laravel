@extends('layouts.list')
@section('list')
<div class="row">
    <div class="col s12">
        <h4>Configuracion de sucursales</h4>
        <blockquote>
            <div class="sub">
                Ayudanos a que tus clientes te conozan mejor, aplicamos mejores metricas cuando configuras las opciones que tenemos para ti. <sub>¡Hasta la luna!</sub>
            </div>
        </blockquote>
    </div>
</div>
<div class="row">
    <div class="col s4">
        <div class="card">
            <div class="card-image">
                <img src="{{ asset("image/sucursal.png") }}" class="responsive-img">
                <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#addEmpresa"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">Agregar una sucursal</span>
            </div>
        </div>
    </div>
    <div class="col s4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="{{ asset("image/market.jpg") }}" class="responsive-img" height="255">
            </div>
            <div class="card-content">
            <span class="card-title grey-text text-darken-4">e-Pymes Inc. <a href="{{ route('branch.edit',['branch' => 1 ]) }}" class="right text-grey text-darken-3 waves-effect waves-red btn-flat"><i class="material-icons">settings</i></a></span>
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure -->
<form action="{{ route($table.'.store')}}" method="post">
    @csrf
    <div id="addEmpresa" class="modal fixed-modal-footer">
        <div class="modal-content light-blue lighten-5">
            <h5>Nueva empresa</h5>
            <div class="row">
                <div class="input-field col l12 m12 s12">
                    <input type="text" id="empresaname" class="validate" name="empresa" required value="{{ old('empresa') }}">
                    <label for="empresaname">Nombre de tu empresa</label>
                    @error('empresaname')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <textarea name="description" id="descripcion" cols="30" rows="10" class="validate materialize-textarea">{{ old('description') }}</textarea>
                    <label for="descripcion">Describe lo que vendes</label>
                    @error('description')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <textarea name="direccion" id="direccion" cols="30" rows="10" class="validate materialize-textarea">{{ old('direccion') }}</textarea>
                    <label for="direccion">Indica tu direccion</label>
                    @error('direccion')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col s12">
                </div>
            </div>
            <div class="modal-footer light-blue lighten-5">
                <button type="submit" class="btn right light-blue darken-4">Guardar</button>
                <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat right">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection
