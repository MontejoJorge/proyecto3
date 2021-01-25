@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Ver obras</p>
        
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Solicitante</th>
                <th>Tipo de edificio</th>
                <th>Tipo de obra</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Trabajador asignado</th>
                <th>Ver</th>
            </tr>
            @forelse ($obras as $obra)
                <tr>
                    <td>{{ $obra->id }}</td>
                    <td>{{ $obra->solicitante->name }}</td>
                    <td>{{ $obra->tipo_edificio->name }}</td>
                    <td>{{ $obra->tipo_obra->name }}</td>
                    <td>{{ $obra->street_name }}</td>
                    <td>{{ $obra->state }}</td>
                    @isset($obra->trabajador)
                    <td>{{ $obra->trabajador->name }}</td>
                    @else 
                    <td>Sin trabrajador</td>
                    @endisset
                    <td><a href="{{ route("obra.show", $obra) }}">Ver obra</a></td>
                </tr>
            @empty
                <p>No hay obras</p>
            @endforelse
        </table>
    </div>
@endsection
