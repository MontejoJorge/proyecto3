@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Ver obras</p>
        <form action="{{ route("obra.index") }}" method="get">
            <select name="state">
                @foreach ($states as $state)
                    @if ($state == $selState)
                        <option value="{{ $state }}" selected>{{ ucfirst($state) }}</option>
                    @else
                        <option value="{{ $state }}">{{ ucfirst($state) }}</option>
                    @endif
                @endforeach
            </select>

            <label for="orderBy">Order by date:</label>
            <select name="order" id="orderBy">
                @foreach ($orderBy as $order)
                    @if ($order == $selOrder)
                        <option value="{{ $order }}" selected>{{ ucfirst($order) }}</option>
                    @else
                        <option value="{{ $order }}">{{ ucfirst($order) }}</option>
                    @endif
                @endforeach
            </select>
            <label for="desc">Descent</label>
            <input type="checkbox" id="desc" name="desc">

            <input type="submit" value="Filtrar">
        </form>
        <br>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Solicitante</th>
                <th>Tipo de edificio</th>
                <th>Tipo de obra</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Trabajador asignado</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Comentarios</th>
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
                    <td>{{ $obra->created_at->diffForHumans() }}</td>
                    <td>{{ $obra->updated_at->diffForHumans() }}</td>
                    <td>{{ $obra->comentarios_count }}</td>
                    <td><a href="{{ route("obra.show", $obra) }}">Ver obra</a></td>
                </tr>
            @empty
                <p>No hay obras</p>
            @endforelse
        </table>
        <p>{{ $obras->links("pagination::bootstrap-4") }}</p>
    </div>
@endsection
