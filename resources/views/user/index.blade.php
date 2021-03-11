@extends('layouts.list')
@section('list')
    <div id="userList">
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    @can($table . '.userrole')
                        <th>Roles</th>
                    @endcan
                    @can($table . '.newpss')
                        <th>Restablecer</th>
                    @endcan
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
                        <td>{{ $e->email }}</td>
                        @can($table . '.userrole')
                            <th>
                                <div class="input-field col s7">
                                    <select name="role" @change="onChange($event,{{ $e->id }},{{ $e->role_id }})">
                                        <option value="0">Sin Rol</option>
                                        @foreach ($rol as $rl)
                                            <option value="{{ $rl->id }}" {{ $e->role_id == $rl->id ? 'selected' : '' }}>
                                                {{ $rl->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        @endcan
                        @can($table . '.newpss')
                            <th>
                                <form action="{{ route($table . '.newpss', ['id' => $e->id]) }}" method="post" class="frmNpas">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn-flat blue-text" type="submit" tag="{{ $e->name }}">
                                        <i class="material-icons">autorenew</i>
                                    </button>
                                </form>
                            </th>
                        @endcan
                        @can($table . '.update')
                            <th><a href="{{ route($table . '.edit', ['user' => $e->id]) }}"><i
                                        class="material-icons">update</i></a></th>
                        @endcan
                        @can($table . '.destroy')
                            <th>
                                <form action="{{ route($table . '.destroy', ['user' => $e->id]) }}" method="post"
                                    class="frmDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-flat red-text btnDelete" type="button" tag="{{ $e->name }}">
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
