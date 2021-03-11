<table class="responsive-table highlight">
    <thead>
        <tr>
            <th>Nombre</th>
            @can($table . '.update')
                <th>Editar</th>
            @endcan
            @can($table . '.destroy')
                <th>Eliminar</th>
            @endcan
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $e)
            <tr>
                <td>{{ $e->name }}</td>
                @can($table . '.update')
                    <th><a href="{{ route($table . '.edit', ['permission' => $e->id]) }}"><i
                                class="material-icons">update</i></a></th>
                @endcan
                @can($table . '.destroy')
                    <th>
                        <a class="btn-flat red-text btnDelete"
                            url="{{ route($table . '.destroy', ['permission' => $e->id]) }}" tag="{{ $e->name }}">
                            <i class="material-icons">delete</i>
                        </a>
                    </th>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
{!! $data->render() !!}
