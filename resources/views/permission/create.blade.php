@extends('layouts.form')
@section('form')
<!-- En el atributo: action solo cambiar la palabra  store / update  
  si es creacion se usa store, si es edicion update
  Tambien cambiar el id del formulario y de cada campo para que funcione materialize. 
-->
<form action="{{ route($table.'.store') }}" method="post" id="formAddPermission">
      @csrf
      <!-- Cambiar el formulario segun los campos necesarios desde aqui -->
      <div class="input-field col s12">
        <input type="text" id="name" class="validate" name="name">
        <label for="name">Nombre</label>
        @error('name')
            <span class="invalid-feedback red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="input-field col s12">
        <input type="text" id="slug" class="validate" name="slug">
        <label for="slug">Slug</label>
        @error('slug')
            <span class="invalid-feedback red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="input-field col s12">
        <textarea id="description" class="materialize-textarea validate" name="description"></textarea>
        <label for="description">Descripcion</label>
        @error('description')
            <span class="invalid-feedback red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <!-- Cambiar hasta aqui lo demas es igual -->
      <div class="col s12  btns">
        <a href="{{ URL::previous() }}" class="btn red darken-1">Volver</a>
        <button class="btn grey darken-1" type="submit">Guardar</button>
      </div>
    </form>
@endsection