@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="card z-depth-4">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col l11">
                                <input type="text" id="search" class="validate" required name="txtSearch"
                                    value="{{ isset($txtSearch) ? $txtSearch : '' }}">
                                <label for="search">Buscar</label>
                            </div>
                            <div class="input-field col l1">
                                <button type="submit" class="btn indigo darker-2 right"><i
                                        class="material-icons small">search</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ((session('danger') && session('danger') != '') || (session('info') && session('info') != ''))
                <script>
                    var mesages = "{{ session('danger') ? session('danger') : session('info') }}";
                    var clas = "{{ session('danger') ? 'red' : 'blue' }}";
                    document.addEventListener('DOMContentLoaded', function() {
                        M.toast({
                            html: mesages,
                            displayLength: 2000,
                            classes: clas + ' rounded'
                        });
                    });

                </script>
            @endif
            @if ($table . '.create' != 'branch.create')
                @can($table . '.create')
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large" href="{{ route($table . '.create') }}">
                            <i class="large material-icons">add</i>
                        </a>
                    </div>
                @endcan
            @endif
            <div class="col s12">
                <div class="card z-depth-4">
                    <div class="card-content" id="result">
                        @yield('list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jq.js') }}"></script>
    <script>
        window.addEventListener("load", function() {
            event(0);
            event(1);
            function api(url,data,method,type){
                fetch(url, {
                    method: method,
                    body: data
                })
                .then(responses => responses.text())
                .then(html => {
                    document.getElementById("result").innerHTML = html;
                    event(type);
                });
            }
            function event(type){
                var btnPag,url;
                if (type){
                    btnPag = document.getElementsByClassName("btnpaginate");
                }else{
                    btnPag = document.getElementsByClassName("btnDelete");
                }
                for (var j = 0; j < btnPag.length; j++) {
                    btnPag[j].addEventListener("click", function() {
                        formData.append('txtSearch', document.getElementById("search").value);
                        formData.append('_token', "{{ csrf_token() }}")
                        url = this.getAttribute("url");
                        if (type){
                            api(url,formData,'post',1);
                        }else{
                            var tag = this.getAttribute("tag");
                            if (confirm("Esta seguro de borrar este registro: " + tag))
                                api(url,formData,'DELETE',0);
                            return false;
                        }
                    });
                }
            }
            var formData = new FormData();
            var fileField = document.querySelector("input[type='text']");
            document.getElementById("search").addEventListener("keyup", () => {
                if ((document.getElementById("search").value.length) >= 1)
                    var url,method,body;
                    var value = document.getElementById("search").value;
                    if (Boolean(value)){
                        url = `/{{ $table }}/search`;
                        formData.append('txtSearch', document.getElementById("search").value);
                        formData.append('_token', "{{ csrf_token() }}");
                        body = {
                            method: 'post',
                            body: formData
                        };
                    }else{
                        url = `/{{ $table }}/1`;
                        body = {
                            method: 'get'
                        };
                    }
                    fetch(url, body)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("result").innerHTML = html;
                        event(false);
                        event(true);
                    });
            });
        });

    </script>
    @yield('scripts-list')
@endsection
