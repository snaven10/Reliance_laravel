@extends('layouts.admin')
@section('content')
    <div class="panel-form"></div>
	<div class="container">
        <div class="row">
            <div class="col s8 push-s2">
                <div class="card horizontal z-depth-4 card-form">
                <div class="card-content">
                    @if ((session('danger') && session('danger') != "") || (session('info') && session('info') != ""))
                        <div class="col s12 contentAlert">
                            <div class="p3 alert white-text {{ (session('danger'))?'amber darken-4':'green accent-2' }}" >
                                <i class="material-icons prefix left">{{ (session('danger'))?'priority_high':'check' }}</i>
                                <span>{{ (session('danger'))?session('danger'):session('info') }}</span>
                                <a href="#" class="waves-effect waves-teal btn-flat btnAlertRemove right"><i class="material-icons medium">clear</i></a>
                            </div>
                        </div>
                    @endif
                   @yield('form') 
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection