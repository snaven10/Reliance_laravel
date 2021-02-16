@extends('layouts.list')
@section('list')
<div id="listrol">
  <table>
    <thead>
      <tr>
          <th>Rol</th>
          <th>Key</th>
          <th>Descripcion</th>
          @can($table.'.update')
            <th>Roles</th>
          @endcan
          @can($table.'.update')
            <th>Editar</th>
          @endcan
          @can($table.'.update')
            <th>Eliminar</th>
          @endcan
      </tr>
    </thead>

    <tbody>
      @foreach ($data as $e)
      <tr>
        <td>{{ $e->name }}</td>
        <td>{{ $e->slug }}</td>
        <td>{{ $e->description }}</td>
        @can($table.'.update')
          <th>
            <a href="{{ route('permisosroles.index', ['roles' => $e->id ]) }}">
              <i class="material-icons">games</i>
            </a>
          </th>
        @endcan
        @can($table.'.update')
          <th>
            <a href="{{ route($table.'.edit', [$table.'' => $e->id ]) }}">
              <i class="material-icons">update</i>
            </a>
          </th>
        @endcan
        @can($table.'.update')
            <th>
              <form action="{{ route($table.'.destroy', [$table.'' => $e->id ]) }}" method="post" class="frmDelete">
                @csrf
                @method('DELETE')
                <button 
                  class="btn-flat red-text btnDelete" 
                  type="button"
                  tag="{{ $e->name }}">
                    <i class="material-icons">delete</i>
                </button>
              </form>
            </th>
        @endcan
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $data->render() }}  
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  <!--Modal usando vuejs--> 
</div> 
@endsection