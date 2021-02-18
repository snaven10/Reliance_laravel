@extends('layouts.form')
@section('form')
<!-- En el atributo: action solo cambiar la palabra  store / update  
  si es creacion se usa store, si es edicion update
  Tambien cambiar el id del formulario y de cada campo para que funcione materialize. 
-->
  <form action="{{ route($table.'.update', ['user' => $data->id ]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="input-field col s6">
      <input id="name" type="text" name="name" class="valid" value="{{ $data->name }}" required autocomplete="name" autofocus>
      <label for="name">Nombre</label>
      @error('name')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
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
    <div class="input-field col s12">
      <button type="submit" class="btn ">
        Actulizar
      </button>
    </div>
  </form>
@endsection
@section('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    </script>
@endsection