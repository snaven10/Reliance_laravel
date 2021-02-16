@extends('layouts.form')
@section('form')

<div id="formAddRol">
  <form action="{{ route($table.'.update', [$table.''=>$p->id]) }}" method="POST" accept-charset="UTF-8">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="input-field col s12">
          <input type="text" id="first_name" class="validate" name="name" required value="{{ $p->name }}">
          <label for="first_name">Nombre del rol</label>
          @error('name')
              <span class="invalid-feedback red-text" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="input-field col s12">
          <input type="text" id="slug" class="validate" name="slug" required value="{{ $p->slug }}">
          <label for="slug">Clave unica del rol</label>
          <span class="helper-text" data-error="wrong" data-success="right">No se debe repetir</span>
          @error('slug')
              <span class="invalid-feedback red-text" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <div class="input-field col s12">
            <textarea name="description" id="description" cols="30" rows="10" class="validate materialize-textarea">{{ $p->description }}</textarea>
            <label for="description">Descripcion</label>
            @error('description')
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      </div>
      <!-- Cambiar hasta aqui lo demas es igual -->
      <div class="col s12 push-s8">
        <a href="{{ URL::previous() }}" class="btn red darken-1">Volver</a>
        <button class="btn grey darken-1" type="submit">Guardar</button>
      </div>
    </form>
  </div>
@endsection
