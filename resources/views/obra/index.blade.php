@extends('layouts.layout')

@section('titulo','Obra')

@section('content')
    <div class="col-sm-12"><p class="h1">Lista de obras</p><hr>
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
        <div class=" col-sm-12 m-0 p-0">

            <table class="table table-hover">

                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <th scope="row">Solicitante</th>
                        <th scope="row">Tipo de edificio</th>
                        <th scope="row">Tipo de obra</th>
                        <th scope="row">Direccion</th>
                        <th scope="row">Estado</th>
                        <th scope="row">Trabajador asignado</th>
                        <th scope="row">Creada</th>
                        <th scope="row">Actualizada</th>
                        <th scope="row">Comentarios</th>
                        <th scope="row">Ver</th>
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
                </tbody>
               
            </table>
            <hr><br>
        </table>
        <p>{{ $obras->links("pagination::bootstrap-4") }}</p>
    </div>

@endsection

