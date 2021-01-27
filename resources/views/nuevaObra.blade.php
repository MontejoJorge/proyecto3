@extends('layout')

@section('titulo', 'Nueva Obra')

@section('contenido')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulario de nueva obra</h1>

    </div>
    <!-- /.container-fluid -->
    <form class="user  p-3">
        <div class="form-group ">
            <input type="search" class="form-control form-control-user" id="address-input"
                   placeholder="Direccion...">
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="num"
                       placeholder="Numero">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="piso"
                       placeholder="Piso">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="mano"
                       placeholder="Mano">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">

            </div>


        </div>

        <div class="form-group row">

            <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea class="form-control form-control-user" id="desc"
                              placeholder="Descripcion"></textarea>
            </div>




            <a href="login.html" class="btn btn-primary btn-user btn-block">
                Enviar obra
            </a>
            <hr>

        </div>
    </form>
@endsection
