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
                        <table class="table">
                            <thead class="thead-dark">
                                <th>{{ 'Materia' }}</th>
                                <th>{{ 'Calificación' }}</th>
                            </thead>
                            <tbody>
                                @foreach($notas as $nota)
                                    <tr>

                                        <td>{{ $nota->asignatura->descripcion }}</td>
                                        <td>{{ $nota->nota }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
