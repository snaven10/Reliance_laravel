@extends('layouts.form')
@section('form')
    <!-- En el atributo: action solo cambiar la palabra  store / update
      si es creacion se usa store, si es edicion update
      Tambien cambiar el id del formulario y de cada campo para que funcione materialize.
    -->
    <form action="{{ route($table . '.update', ['location' => $data->id]) }}" method="POST" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-field col s6">
            <input id="code" type="text" name="code" class="valid" value="{{ $data->code }}" required autocomplete="code"
                autofocus>
            <label for="code">Codigo</label>
            @error('code')
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-field col s12">
            <input id="shelvest" type="text" class="valid" name="shelvest" value="{{ $data->shelvest }}" required
                autocomplete="shelvest">
            <label for="shelvest">Estante</label>
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
