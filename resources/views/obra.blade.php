@extends('layout')

@section('titulo','Obra')

@section('contenido')
    <div class="col-sm-12"><p class="h1">Datos de la obra</p><hr>
        <p class="h3">Ubicación:</p>
        <div class=" col-sm-12 m-0 p-0">

            <div id="mapid"></div><br><br>

            <table class="table table-hover">

                <tbody>
                <tr>
                    <th scope="row">Solicitante:</th>
                    <td>Josefa La Cerda</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de edificio:</th>
                    <td>Restaurante</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de construccion:</th>
                    <td>Reforna</td>

                </tr>
                <tr>
                    <th scope="row">Técnico:</th>
                    <td>Jorge Montejo</td>

                </tr>
                <tr>
                    <th scope="row">Calle:</th>
                    <td>Aldabe</td>

                </tr>
                <tr>
                    <th scope="row">Número:</th>
                    <td>24</td>

                </tr>
                <tr>
                    <th scope="row">Piso:</th>
                    <td>3º</td>

                </tr>
                <tr>
                    <th scope="row">Mano:</th>
                    <td>IZQ</td>

                </tr>
                <tr>
                    <th scope="row">Ciudad:</th>
                    <td>Vitoria</td>

                </tr>
                <tr>
                    <th scope="row">Provincia:</th>
                    <td>Alava</td>

                </tr>
                <tr>
                    <th scope="row">Fecha creación:</th>
                    <td>11/08/2000</td>

                </tr>
                <tr>
                    <th scope="row">Fecha actualización:</th>
                    <td>11/06/2021</td>

                </tr>
                <tr>
                    <th scope="row">Fecha inicio:</th>
                    <td>12/06/2021</td>

                </tr>
                <tr>
                    <th scope="row">Fecha fin:</th>
                    <td>12/09/2022</td>

                </tr>
                <tr>
                    <th scope="row">Descripción:</th>
                    <td>Esta obra es una reforma de cocina para que chicote pueda ir a comer al restaurante</td>

                </tr>
                <tr>
                    <th scope="row">Plano:</th>
                    <td><button id="blueprint"> Descargar plano</button></td>

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

@endsection
