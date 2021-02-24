@extends('layouts.list')
@section('list')
<div class="row">
    <div class="col s12">
        <h4>Configuracion de sucursales</h4>
        <blockquote>
            <div class="sub">
                Apartado donde se agregan mas sucursales. <sub>¡Hasta la luna!</sub>
            </div>
        </blockquote>
    </div>
</div>
<div class="row">
    @can($table.'.create')
        <div class="col s4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset("image/sucursal.png") }}" class="responsive-img">
                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#addbranch"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Agregar una sucursal</span>
                </div>
            </div>
        </div>
    @endcan
    @foreach ($data as $row)
        <div class="col s4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{ asset("image/market.jpg") }}" class="responsive-img" height="255">
                </div>
                <div class="card-content">
                <span class="card-title grey-text text-darken-4">{{ $row->branch_office }} <a href="{{ route('branch.edit',['branch' => $row->id ]) }}" class="right text-grey text-darken-3 waves-effect waves-red btn-flat"><i class="material-icons">settings</i></a></span>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Modal Structure -->
<form action="{{ route($table.'.store')}}" method="post">
    @csrf
    <div id="addbranch" class="modal fixed-modal-footer branch_offices">
        <div class="modal-content light-blue lighten-5">
            <h5>Nueva sucursal</h5>
            <div class="row">
                <div class="input-field col l12 m12 s12">
                    <input type="text" id="branch_office" class="validate" name="branch_office" required value="{{ old('branch_office') }}">
                    <label for="branch_office">Nombre de sucursal</label>
                    @error('branch_office')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <textarea name="direction" id="direction" cols="30" rows="10" class="validate materialize-textarea">{{ old('direction') }}</textarea>
                    <label for="direction">Direccion de la sucursal</label>
                    @error('direction')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
@section('scripts-list')
    @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const branchs = document.querySelector('.branch_offices');
                instance = M.Modal.getInstance(branchs);
                instance.open();
            });
        </script>
    @endif
@endsection
