@extends('layouts.form')
@section('form')
<!-- En el atributo: action solo cambiar la palabra  store / update  
  si es creacion se usa store, si es edicion update
  Tambien cambiar el id del formulario y de cada campo para que funcione materialize. 
-->
  <form action="{{ route($table.'.update', ['user' => $data->id ]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="name" type="text" name="name" class="valid" value="{{ $data->name }}" required autocomplete="name" autofocus>
          <label for="name">Nombre</label>
          @error('name')
            <span class="invalid-feedback red-text" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-field col s6">
          <input id="lastname" type="text" name="lastname" class="valid" value="{{ $data->lastname }}" required autocomplete="lastname">
          <label for="lastname">Apellido</label>
          @error('lastname')
            <span class="invalid-feedback red-text" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
    </div>
    <div class="input-field col s12">
      <input id="email" type="email" class="valid" name="email" value="{{ $data->email }}" required autocomplete="email">
      <label for="email">Correo electronico</label>
      @error('email')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="number" class="valid" name="telefono" value="{{ $data->telefono }}" required autocomplete="telefono">
          <label for="email">Telefono</label>
          <small>Numero de telefono sin area, ni guiones. Ej.: 77777777</small>
          @error('email')
            <span class="invalid-feedback red-text" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-field col s6">
          <select name="tipo_usuario" required>
            <option value="" disabled>Elija una opcion</option>
            <option value="96483" {{ ($data->tipo_usuario=='96483')?'selected':'' }} >Empresa</option>
            <option value="56103" {{ ($data->tipo_usuario=='56103')?'selected':'' }} >Cliente</option>
            <option value="78491" {{ ($data->tipo_usuario=='78491')?'selected':'' }} >Repartidor</option>
          </select>
          @error('tipo_usuario')
            <span class="invalid-feedback red-text" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
    </div>
    <div class="input-field col s12">
      <button type="submit" class="btn ">
        Actulizar
      </button>
    </div>
  </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/iconList.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    </script>
@endsection