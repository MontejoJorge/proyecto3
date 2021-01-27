@extends('layouts.app')
@section('content')
    <div class="container">
        <p>{{ $obra->id }}</p>
        <ul>
            <li>{{ $obra->solicitante->name }}</li>
            <li>{{ $obra->tipo_edificio->name }}</li>
            <li>{{ $obra->tipo_obra->name }}</li>
            @isset($obra->worker_id)
            <li>{{ $obra->trabajador->name }}</li>
            @else 
            <li>
                <form action="{{ route("obra.trabajador", $obra) }}" method="post">
                    @csrf
                    <select name="tecnico">
                        <option value="null" selected disabled>Selecciona un tecnico</option>
                    @foreach ($trabajadores as $trabajador)
                        <option value="{{ $trabajador->id }}">
                            {{ $trabajador->name ." | ". $trabajador->obra_asignada_count . " obras"}}
                        </option>
                    @endforeach
                    </select>
                    <input type="submit" value="Aceptar">
                </form>
            </li>
            @endisset
            <li>{{ $obra->street_name }}</li>
            <li>{{ $obra->number }}</li>
            <li>{{ $obra->floor }}</li>
            <li>{{ $obra->door }}</li>
            <li>{{ $obra->postal_code }}</li>
            <li>{{ $obra->city }}</li>
            <li>{{ $obra->start_date }}</li>
            <li>{{ $obra->end_date }}</li>
            <li>{{ $obra->state }}</li>
            <li>{{ $obra->description }}</li>
            <li>{{ $obra->created_at->diffForHumans() }}</li>
            <li>{{ $obra->updated_at }}</li>
        </ul>
        <form action="{{ route("comentario.store", $obra) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="text"></textarea>
            <input type="file" name="photo">
            <input type="submit" value="Enviar">
        </form>

        @foreach ($obra->comentarios as $comentario)
            <div class="card">
                <p>{{ $comentario->text }}</p>
                <img src="{{ asset('/storage/imagenes/comentarios/'.$comentario->photo)}}">
                <p>{{ $comentario->trabajador->name. " - " . $comentario->created_at->diffForHumans()}}</p>
            </div>
        @endforeach
        
        @if ($errors->any())
        @foreach ($errors->all() as $e)
            {{ $e }}
        @endforeach
    @endif
    </div>
@endsection