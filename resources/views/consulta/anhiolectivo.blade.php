@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selecciona un año lectivo
                    <br>
                    <br>
                    <div>
                        <ul>
                            @foreach($anhiosLectivos as $anhioLectivo)
                            <li>
                                <a href="{{ route('anhiolectivo') }}">{{ $anhioLectivo->descripcion }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
