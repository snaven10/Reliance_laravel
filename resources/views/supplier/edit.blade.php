@extends('layouts.form')
@section('form')
    <!-- En el atributo: action solo cambiar la palabra  store / update
        si es creacion se usa store, si es edicion update
        Tambien cambiar el id del formulario y de cada campo para que funcione materialize.
    -->
    <form action="{{ route($table . '.update', ['supplier' => $data->id]) }}" id="formsupplier" method="POST" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-field col s12">
            <input id="name" type="text" name="name" class="valid" value="{{ $data->name }}" required autocomplete="name"
                autofocus>
            <label for="name">Nombre proveedor</label>
            @error('name')
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-field col s12">
            <input id="email" type="email" class="valid" name="email" value="{{ $data->email }}" required="required"
                autocomplete="email">
            <label for="email">Correo</label>
            @error('email')
                <span class='invalid-feedback red-text' role='alert'>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="nit_company" type="text" class="valid" name="nit_company" value="{{ $data->nit_company }}"
                        required autocomplete="email">
                    <label for="nit_company">NIT Proveedor</label>
                    @error('nit_company')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input id="phone" type="text" class="valid" name="phone" v-mask="'(503)-####-####'" v-model="phone" required
                        autocomplete="email">
                    <label for="phone">Telefono</label>
                    @error('phone')
                        <span class="invalid-feedback red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="input-field col s12">
            <textarea name="addres" id="addres" cols="30" rows="10"
                class="valid materialize-textarea">{{ $data->addres }}</textarea>
            <label for="addres">Direccion de la sucursal</label>
            @error('addres')
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
        // As a plugin
        Vue.use(VueMask.VueMaskPlugin);
        new Vue({
            el:'#formsupplier',
            data:{
                phone: @json($data->phone)
            },
            methods:{},
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

    </script>
@endsection
