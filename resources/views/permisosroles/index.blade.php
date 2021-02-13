@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col s12 permirol">
    		<div class="col s6">
				<div class="row">
					<h3>Asignados</h3>
					<div class="input-field col l11">
						<input type="text" id="search" v-model='buscar' @keyup="searchasig()">
						<label for="search">Buscar</label>
					</div>
					<div 
						is="todo-item"
						v-for="(perm , index) in temporal" 
						v-bind:permi="perm"
						v-bind:inde="index"
						v-bind:posi="false"
						v-if="perm.permission_role_id"
						>
					</div>						
				</div>	      
			</div>
			<div class="col s6">
				<div class="row">
					<h3>Sin Asignados</h3>
					<div class="input-field col l11">
						<input type="text" id="search" v-model='buscar2' @keyup="searchsin()">
						<label for="search">Buscar</label>
					</div>
					<div 
						is="todo-item"
						v-for="(perm , index) in temporal2" 
						v-bind:permi="perm"
						v-bind:inde="index"
						v-bind:posi="true"
						v-if="perm.permission_role_id == null"
						>
					</div>						
				</div>	      
			</div>
    	</div>
    </div>
</div>  
@endsection
@section('scripts')
    <script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.tooltipped');
			var instances = M.Tooltip.init(elems);
		});
		Vue.component('todo-item', {
			template: '\
			<div class="col s4">\
				<label>\
			        <input type="checkbox" @change="vu.envio(permi.id,permi.permission_role_id,inde,posi)" :checked="permi.permission_role_id" />\
			        <span class="tooltipped" data-position="bottom" :data-tooltip="permi.description">@{{ permi.name }}</span>\
			    </label>\
			</div>',
			props: ['permi','inde','posi']
		});

		var vu = new Vue({
			el:".permirol",
			data:{
				buscar:'',
				buscar2:'',
          		tk:"{{ csrf_token() }}",
				temporal:@json($permisos),
				temporal2:@json($permisos),
				permisos:@json($permisos)
			},
			methods:{
				searchasig:function() {
					var i = new RegExp(this.buscar.trim(), 'i');
					this.temporal = this.permisos.filter(function(permisos) {
						return (
							i.test(permisos.name)	||
							i.test(permisos.description)
							);
					})
				},
				searchsin:function() {
					var i = new RegExp(this.buscar2.trim(), 'i');
					this.temporal2 = this.permisos.filter(function(permisos) {
						return (
							i.test(permisos.name)	||
							i.test(permisos.description)
							);
					})
				},
				envio:function(id,permission_role_id,inde,posi) {
					if(posi){
						var url = "{{ route('permisosroles.store', ['roles' => $roles ]) }}";
						var params = {
							_token  : this.tk,
							permiso : id,
							roles   : '{{$roles}}'
						};
						this.api(url, params, inde);
					}else{
						var url = "{{ route('permisosroles.destroy', ['rolesper' => 'permission_role_id' ]) }}";
						url =  url.replace("permission_role_id",permission_role_id);
						var params = {
							_token  : this.tk,
							_method  : 'DELETE',
							permission_role : permission_role_id
						};
						this.api(url, params, inde);
					}
				},
				api:function(url, param, inde){
					axios.post(url, param)
					.then(response => {
						this.permisos[inde]['permission_role_id'] = response.data.id;
						this.temporal[inde]['permission_role_id'] = response.data.id;
						this.temporal2[inde]['permission_role_id'] = response.data.id;
						this.recargartool;
					}).catch(e => {
					  console.log(e);
					});
				},
				recargartool:function() {
					var elems = document.querySelectorAll('.tooltipped');
					var instances = M.Tooltip.init(elems);
				}
			}
		});
    </script>
@endsection