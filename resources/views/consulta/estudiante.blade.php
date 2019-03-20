@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Representante: {{ $representante->fullname() }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($estudiantes)>0)
                        Por favor, selecciona uno de tus representados:
                        <br>
                        <br>
                        <div>
                            <ul>
                                @foreach($estudiantes as $estudiante)
                                <li>
                                    <a href="{{ route('notas',['inicioanhioLectivo'=>$anhiolectivo->inicio,'estudianteId'=>$estudiante->id]) }}">{{ $estudiante->fullname() }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        Usted no tiene representados, consulte en el area de administración del colegio.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
