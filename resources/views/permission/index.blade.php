@extends('layouts.list')
@section('list')
<table>
    <thead>
      <tr>
          <th>Nombre</th>
          <th>Slug</th>
          <th>Descripcion</th>
          @can($table.'.update')
            <th>Editar</th>
          @endcan
          @can($table.'.update')
            <th>Eliminar</th>
          @endcan
      </tr>
    </thead>

    <tbody>
      @foreach($data as $e)
      <tr>
        <td>{{ $e->name }}</td>
        <td>{{ $e->slug }}</td>
        <td>{{ $e->description }}</td>
        @can($table.'.update')
        <th><a href="{{ route($table.'.edit', ['permission' => $e->id ]) }}"><i class="material-icons">update</i></a></th>
        @endcan
        @can($table.'.update')
        <th>
          <form action="{{ route($table.'.destroy', ['permission' => $e->id ]) }}" method="post" class="frmDelete">
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
  {!! $data->render() !!}   
@endsection