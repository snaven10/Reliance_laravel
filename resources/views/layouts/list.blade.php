@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">
				<form action="{{ route($table.'.search') }}" method="POST">
					@csrf
					<div class="input-field col l11">
						@isset($txtSearch)
							<a href="{{ route($table.'.index') }}" class="waves-effect waves-light btn-flat left prefix"><i class="material-icons small">clear</i></a>
						@endisset
						<input type="text" id="search" class="validate" required name="txtSearch" value="{{ (isset($txtSearch))? $txtSearch :'' }}">
						<label for="search">Buscar</label>

					</div>
					<div class="input-field col l1">
						<button type="submit" class="btn indigo darker-2 right"><i class="material-icons small">search</i></button>

					</div>
				</form>
			</div>
			@can($table.'.create')
				<div class="col s12">
					<a href="{{ route($table.'.create') }}" class="btn"><i class="material-icons left">add</i> Agregar</a>
				</div>
			@endcan
			@if ((session('danger') && session('danger') != "") || (session('info') && session('info') != ""))
				<div class="col s12 contentAlert">
					<div class="p3 alert white-text {{ (session('danger'))?'amber darken-4':'green accent-2' }}" >
						<i class="material-icons prefix left">{{ (session('danger'))?'priority_high':'check' }}</i>
						<span>{{ (session('danger'))?session('danger'):session('info') }}</span>
						<a href="#" class="waves-effect waves-teal btn-flat btnAlertRemove right"><i class="material-icons medium">clear</i></a>
					</div>
				</div>
			@endif	
			@if ($table == 'user')
				<div 
					class="col s12 contentAlert alrt" 
					v-if="message != null">
					<div 
						class="p3 alert white-text" 
						v-bind:class="{ 'green accent-2': classinfo, 'amber darken-4': classdanger }">
						<i class="material-icons prefix left">@{{ tipo }}</i>
						<span>@{{ message }}</span>
						<a href="#" @click="getdelete()" class="waves-effect waves-teal btn-flat btnAlertRemove right">
							<i class="material-icons medium">clear</i>
						</a>
					</div>
				</div>
			@endif
			<div class="col s12">
				@yield('list')
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('js/jq.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.btnAlertRemove').click(function (e) {
				$('.contentAlert').hide('fast');
			 });
			$(".btnDelete").click(function (e) {
				e.preventDefault();
				console.log('Click')
				var tag 		= $(this).attr('tag');
				var frmDelete 	= $(this).parent('.frmDelete');
				if(confirm("Esta seguro de borrar este registro: "+tag))
					return frmDelete.submit();
				return false;
			});
		});
	</script>
	@yield('scripts-list')
@endsection
