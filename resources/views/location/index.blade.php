@extends('layouts.list')
@section('list')
    <div id="result">
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Estante</th>
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
                        <td>{{ $e->code }}</td>
                        <td>{{ $e->shelvest }}</td>
                        @can($table . '.update')
                            <th><a href="{{ route($table . '.edit', ['location' => $e->id]) }}"><i
                                        class="material-icons">update</i></a></th>
                        @endcan
                        @can($table . '.destroy')
                            <th>
                                <form action="{{ route($table . '.destroy', ['location' => $e->id]) }}" method="post"
                                    class="frmDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-flat red-text btnDelete" type="button" tag="{{ $e->shelvest }}">
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
    </div>
@endsection
@section('scripts-list')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
        new Vue({
            el: '#userList',
            data: {
                tk: "{{ csrf_token() }}"
            },
            methods: {
                onChange: function(event, iduser, role_id) {
                    var datoselect = event.target.value;
                    //console.log(event.originalTarget.options[2].attributes.selected.value);
                    if (datoselect == 0) {
                        var role;
                        var info = event.originalTarget.options;
                        for (var i = 0; i < info.length; i++) {
                            if (info[i].attributes.hasOwnProperty('selected')) {
                                role = info[i].label;
                            }
                        }
                        if (role_id) {
                            var params = {
                                _token: this.tk,
                                _method: 'DELETE',
                            };
                            url = "destroy/users/" + iduser + "/role/" + role;
                            this.api(url, params);
                        }
                    } else if (datoselect > 0) {
                        var role = event.target.options[event.target.selectedIndex].text;
                        if (role_id) {
                            var params = {
                                _token: this.tk,
                                _method: 'PUT',
                                role: role,
                                user: iduser,
                            };
                            url = "{{ route('roleuser.update') }}";
                            this.api(url, params);
                        } else {
                            var role = event.target.options[event.target.selectedIndex].text;
                            var params = {
                                _token: this.tk,
                                role: role,
                                user: iduser,
                            };
                            url = "{{ route('roleuser.store') }}";
                            this.api(url, params);
                        }
                    }
                },
                api: function(url, param) {
                    axios.post(url, param)
                        .then(response => {
                            if (response.data.tipo == 'info') {
                                M.toast({
                                    html: response.data.mensaje,
                                    displayLength: 2000,
                                    classes: 'teal rounded'
                                });
                            } else {
                                M.toast({
                                    html: response.data.mensaje,
                                    displayLength: 2000,
                                    classes: 'red rounded'
                                });
                            }
                        }).catch(e => {
                            console.log(e);
                        });
                },
            }
        });

    </script>
@endsection
