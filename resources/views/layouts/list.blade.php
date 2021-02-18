@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
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
            @if ($table.'.create' != 'branch.create')
                @can($table.'.create')
                    <div class="col s12">
                        <a href="{{ route($table.'.create') }}" class="btn"><i class="material-icons left">add</i> Agregar</a>
                    </div>
                @endcan
            @endif
			@if ((session('danger') && session('danger') != "") || (session('info') && session('info') != ""))
				<script>
					var mesages = "{{ (session('danger'))?session('danger'):session('info') }}";
					var clas = "{{ (session('danger'))? 'red' : 'blue' }}";
					document.addEventListener('DOMContentLoaded', function() {
						M.toast({
							html: mesages,
							displayLength: 2000,
							classes: clas+' rounded'
						});
					});
				</script>
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
