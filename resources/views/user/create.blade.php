@extends('layouts.form')
@section('form')
<!-- En el atributo: action solo cambiar la palabra  store / update
  si es creacion se usa store, si es edicion update
  Tambien cambiar el id del formulario y de cada campo para que funcione materialize.
-->
  <form action="{{ route($table.'.store') }}" method="post" id="formAddUser">
    @csrf
    <div class="input-field col s12">
      <input id="name" type="text" name="name" class="valid" value="{{ old('name') }}" required autocomplete="name" autofocus>
      <label for="name">Nombre</label>
      @error('name')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-field col s12">
      <input id="email" type="email" class="valid" name="email" value="{{ old('email') }}" required autocomplete="email">
      <label for="email">Correo electronico</label>
      @error('email')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-field col s12">
      <input id="password" type="password" class="valid" name="password" required autocomplete="new-password">
      <label for="password">{{ __('Contrasena') }}</label>
      @error('password')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-field col s12">
      <input id="password-confirm" type="password" class="valid" name="password_confirmation" required autocomplete="new-password">
      <label for="password-confirm">{{ __('Confirme la contrasena') }}</label>
      @error('password_confirmation')
        <span class="invalid-feedback red-text" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-field col s12">
      <button type="submit" class="btn ">
        Registrarme
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
