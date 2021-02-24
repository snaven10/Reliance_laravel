@extends('layouts.form')
@section('form')
<!-- En el atributo: action solo cambiar la palabra  store / update
  si es creacion se usa store, si es edicion update
  Tambien cambiar el id del formulario y de cada campo para que funcione materialize.
-->
<form action="{{ route($table.'.update', ['permission' => $data->id ]) }}" method="post" id="formAddPermission">
      @csrf
      @method('PUT')
      <!-- Cambiar el formulario segun los campos necesarios desde aqui -->
      <div class="input-field col s12">
        <input type="text" id="name" class="validate" name="name" value="{{ $data->name }}">
        <label for="name">Nombre</label>
        @error('name')
            <span class="invalid-feedback red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <!-- Cambiar hasta aqui lo demas es igual -->
      <div class="col s12  btns">
        <a href="{{ URL::previous() }}" class="btn red darken-1">Volver</a>
        <button class="btn grey darken-1" type="submit">Actulizar</button>
      </div>
    </form>
@endsection
