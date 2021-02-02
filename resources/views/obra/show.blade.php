@extends('layouts.layout')
@section('content')
<div class="col-sm-12"><p class="h1">Datos de la obra {{ $obra->id }}</p><hr>
    <p class="h3">Ubicación:</p>
    <div class=" col-sm-12 m-0 p-0">

        <div id="mapid"></div><br><br>

        <table class="table table-hover">

            <tbody>
                <tr>
                    <th scope="row">Solicitante:</th>
                    <td>{{ $obra->solicitante->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de edificio:</th>
                    <td>{{ $obra->tipo_edificio->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de construccion:</th>
                    <td>{{ $obra->tipo_obra->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Técnico:</th>
                    <td>

                        <form action="{{ route("obra.trabajador", $obra) }}" method="post">
                            @csrf
                            <select name="tecnico">
                                <option selected disabled>Selecciona un tecnico</option>
                            @foreach ($trabajadores as $trabajador)
                                <option value="{{ $trabajador->id }}">
                                    {{ $trabajador->name ." | ". $trabajador->obra_asignada_count . " obras"}}
                                </option>
                            @endforeach
                            </select>
                            <input type="submit" value="Aceptar">
                        </form>
                    </td>

                </tr>
                <tr>
                    <th scope="row">Calle:</th>
                    <td>{{ $obra->street_name }}</td>

                </tr>
                <tr>
                    <th scope="row">Número:</th>
                    <td>{{ $obra->number }}</td>

                </tr>
                <tr>
                    <th scope="row">Piso:</th>
                    <td>{{ $obra->floor }}</td>

                </tr>
                <tr>
                    <th scope="row">Mano:</th>
                    <td>{{ $obra->door }}</td>

                </tr>
                <tr>
                    <th scope="row">Codigo postal:</th>
                    <td>{{ $obra->postal_code }}</td>
                </tr>
                <tr>
                    <th scope="row">Ciudad:</th>
                    <td>{{ $obra->city }}</td>

                </tr>
                <tr>
                    <th scope="row">Provincia:</th>
                    <td>{{ $obra->province }}</td>

                </tr>
                <tr>
                    <th scope="row">Fecha inicio:</th>
                    <td>{{ $obra->start_date }}</td>

                </tr>
                <tr>
                    <th scope="row">Fecha fin:</th>
                    <td>{{ $obra->end_date }}</td>

                </tr>
                <tr>
                    <th scope="row">Estado</th>
                    <td>{{ $obra->state }}</td>
                </tr>
                <tr>
                    <th>Creada hace</th>
                    <td>{{ $obra->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th scope="row">Fecha actualizacion:</th>
                    <td>{{ $obra->updated_at }}</td>

                </tr>
                <tr>
                    <th scope="row">Fecha creacion:</th>
                    <td>{{ $obra->created_at }}</td>

                </tr>
                <tr>
                    <th scope="row">Descripción:</th>
                    <td id="desc">{{ $obra->description }}</td>

                </tr>
                <tr>
                    <td scope="row">Ver plano:</td>
                    <td><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" target="_blank" >Ver Plano</a></td>

                </tr>
                <tr>
                    <th scope="row">Descargar plano:</th>
                    <td><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" download >Descargar Plano</a></td>
                </tr>
                
                
            
                </tr>
            </tbody>
        </table>
        <hr><br>
        <form action="#" method="post">
            <p class="h2">Añadir comentario</p>
            <label for="areaComentario">Escribe aqui tu comentario </label>
            <textarea class="form-control" id="areaComentario" rows="3"></textarea><br>
            <button type="submit" class="btn btn-secondary">Enviar</button>


        </form>
                <p id="lat">42.864512</p>
                <p id="lng"> -2.681335</p>
        <hr>
        <br>
        <div class="comentario">
            <p class="h2">Titulo comentario</p>
            <p class="h5">11/09/2001</p>
            La verdad que ha sido un buen dia
            La verdad que ha sido un buen dia
            La verdad que ha sido un buen dia
            La verdad que ha sido un buen dia
        </div>
        <hr><br>




    </div>
    {{-- <div class="container">
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
            <li><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" target="_blank" >Ver Plano</a></li>
            <li><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" download >Descargar Plano</a></li>
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
    </div> --}}
@endsection