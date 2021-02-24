@extends('layouts.form')
@section('content')
    <div class="row">
        <div class="col s12">
        <div class="col s12 m3">
            <span class="settings-title"><h5>Config de empresas</h5></span>
            <p>Configuraciones generales de tu empresa en informacion basica de ella</p>
        </div>
        <div class="col s12 m9">
            <ul class="collapsible popout">
            <li>
                <div class="collapsible-header">
                <div class="col s12">
                    <i class="material-icons">place</i>Cordenadas de tu empresa
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Sin nos brindas las cordenas de tu empresa se nos sera mas facil ubicar tus posibles clientes para que recojan sus compras y ofrecer mas facil mente tus productos a los clientes mas sercanos.</span>
                <textarea id="cordenadas" class="materialize-textarea validate" name="cordenadas" placeholder="Cordenadas"></textarea>
                <label for="cordenadas">Cordenadas</label>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                <div class="col s12">
                    <i class="material-icons">store</i>Ubicacion de tu empresa
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Cuentanos donde te encuentras donde es la direccion tu empresa.</span>
                <textarea id="direccion" class="materialize-textarea validate" name="direccion" placeholder="Direccion"></textarea>
                <label for="direccion">Direccion</label>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                <div class="col s12">
                    <i class="material-icons">border_color</i>Describe tu empresa
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Aqui se encuentra una brebe descripcion de lo que es tu negocio ablanos de el.</span>
                <textarea id="descripcion" class="materialize-textarea validate" name="descripcion" placeholder="descripcion"></textarea>
                <label for="descripcion">Descripcion</label>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                <div class="col s12 m11">
                    <i class="material-icons">monetization_on</i>Ocultar precios
                </div>
                <div class="col s12 m1">
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Si decides ocultar el precio de tus productos no podran servistos por los demas solo por clientes de tu eleccion o cofiansa. deseas ocultar los precio</span>
                <div class="switch">
                    <label>
                    No
                    <input type="checkbox">
                    <span class="lever"></span>
                    Si
                    </label>
                </div>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                <div class="col s12">
                    <i class="material-icons left">local_shipping</i>
                    <span>Municpios de Domiciolios</span>
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Recuerda si tienes los municipios donde integras domicilios. las busquedas des tus productos seran mas eficientes. y podras estar entre las empresas sugeridas.</span>
                <a href="#!" class="btn"> agregar domicilios a tu empresa</a>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                <div class="col s12">
                    <i class="material-icons">view_module</i>Configurar complementos
                    <i class="material-icons caret right">keyboard_arrow_right</i>
                </div>
                </div>
                <div class="collapsible-body">
                <span>Lorem ipsum dolor sit amet.</span>
                </div>
            </li>
            </ul>
        </div>
        </div>
        <div class="col s12">
            <div class="col s12 m3">
                <span class="settings-title"><h5>Config de Usuario</h5></span>
                <p>Configuraciones de usuario. Aqui puedes moodificar tu usuario, password, telefono </p>
            </div>
            <div class="col s12 m9">
                <ul class="collapsible popout">
                    <li>
                        <div class="collapsible-header">
                        <div class="col s12">
                            <i class="material-icons">person_add</i>Usuarios asignados a empresa
                            <i class="material-icons caret right">keyboard_arrow_right</i>
                        </div>
                        </div>
                        <div class="collapsible-body">
                        <span>En este apartado podras agregar o eliminar usuarios de tu empresa administraodres o vendedores </span>
                        <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
                        <br><br>
                        <div class="chip">
                            juan carlos
                            <i class="close material-icons">close</i>
                        </div>
                        <div class="chip">
                            juan carlos
                            <i class="close material-icons">close</i>
                        </div>
                        <div class="chip">
                            <i class="material-icons"></i>
                            juan carlos
                            <i class="close material-icons">close</i>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
