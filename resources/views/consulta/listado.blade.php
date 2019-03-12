@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(!isset($estudiante))
                    <div class="card-header"> Usuario desconocido, consulte con  el area de secretaria del colegio</div>
                @else
                    <div class="card-header">
                        Año lectivo: {{ $anhiolectivo->descripcion }}
                        <br>
                        Notas del estudiante: {{ $estudiante->fullname() }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
