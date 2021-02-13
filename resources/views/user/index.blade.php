@extends('layouts.list')
@section('list')
<div id="userList">
  <table>
    <thead>
      <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Telefono</th>
          @can($table.'.update')
            <th>Roles</th>    
          @endcan
          @can($table.'.update')
            <th>Restablecer</th>
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
      @foreach($data as $e)
      <tr>
        <td>{{ $e->name }} {{ $e->lastname }}</td>
        <td>{{ $e->email }}</td>
        <td>{{ $e->telefono }}</td>
        @can($table.'.update')
          <th>
            <div class="input-field col s7">
              <select
                name="role"
                @change="onChange($event,{{$e->id}},{{$e->userrol_id}})">
                <option value="0">Sin Rol</option>
                @foreach($rol as $rl)
                  <option value="{{ $rl->id }}" {{ ($e->role_id==$rl->id)?'selected':'' }} >{{ $rl->name }}</option>
                @endforeach
              </select>
            </div>
          </th>
        @endcan
        @can($table.'.update')
        <th>
          <form action="{{ route($table.'.newpss', ['id' => $e->id ]) }}" method="post" class="frmNpas">
            @csrf
            @method('PUT')
            <button 
                class="btn-flat blue-text"
                type="submit"
                tag="{{ $e->name }}">
                    <i class="material-icons">autorenew</i>
              </button>
          </form>
        </th>
        @endcan
        @can($table.'.update')
        <th><a href="{{ route($table.'.edit', ['user' => $e->id ]) }}"><i class="material-icons">update</i></a></th>
        @endcan
        @can($table.'.update')
        <th>
          <form action="{{ route($table.'.destroy', ['user' => $e->id ]) }}" method="post" class="frmDelete">
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
</div>
@endsection
@section('scripts-list')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    var mes = new Vue({
      el:'.alrt',
      data: {
        tipo: null,
        message: null,
        classinfo: true,
        classdanger: false
      },
      methods:{
        getdelete:function() {
          this.message = null;
        }
      }
    });
    new Vue({
      el:'#userList',
      data: {
        tk: "{{ csrf_token() }}"
      },
      methods:{
        onChange:function(event,iduser,iduserrol) {
          var datoselect = event.target.value;
          if (datoselect == 0) {
            if (iduserrol) {
              var params = {
                _token  : this.tk,
                _method  : 'PUT',
              };
              url = "destroy/users/rols/"+iduserrol;
              this.api(url, params);
            }
          }else if(datoselect > 0){
            if (iduserrol) {
              var params = {
                _token  : this.tk,
                _method  : 'PUT',
                role : datoselect,
                user : iduser,
                userrol : iduserrol,
              };
              url = "{{ route('roluser.update') }}";
              this.api(url, params);
            }else{
              var params = {
                _token  : this.tk,
                role : datoselect,
                user : iduser,
                userrol : iduserrol,
              };
              url = "{{ route('roluser.store') }}";
              this.api(url, params);
            }
          }
        },
        api:function(url, param){
            axios.post(url, param)
            .then(response => {
                mes.tipo = response.data.tipo;
                if(mes.tipo=='info'){
                  mes.classinfo = true;
                  mes.classdanger = false;
                }else{
                  mes.classinfo = false;
                  mes.classdanger = true;
                }
                mes.message = response.data.mensaje;
            }).catch(e => {
                console.log(e);
            });
        },
      }
    })    
  </script>
@endsection