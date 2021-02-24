@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col s12">
            @foreach ($modulos as $m)
                @can($m['name'] . '.index')
                    <div class="col s12 m3 l3 ">
                        <div class="card blue-grey darken-1 ">
                            <div class="card-content white-text card-admin valign-wrapper">
                                <span
                                    class="card-title upper">{{ isset($m['title']) && $m['title'] != '' ? $m['title'] : $m['name'] }}</span>
                            </div>
                            <div class="card-action">
                                <a href="{{ route($m['name'] . '.index') }}">Ver</a>
                                @can($m['name'] . '.create')
                                    <a href="{{ route($m['name'] . '.create') }}">Agregar</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
    </div>
@endsection
