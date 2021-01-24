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
            </tr>
            @forelse ($obras as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->solicitante->name }}</td>
                    <td>{{ $i->tipo_edificio->name }}</td>
                    <td>{{ $i->tipo_obra->name }}</td>
                    <td>{{ $i->street_name }}</td>
                </tr>
            @empty
                <p>No hay obras</p>
            @endforelse
        </table>
    </div>
@endsection
