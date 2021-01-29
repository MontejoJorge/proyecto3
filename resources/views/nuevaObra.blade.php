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
                <select class="form-select col-sm-12" name="tipoTrabajador">
                    <option selected>Edificio</option>
                    <option value="tecnico">Técnico</option>
                    <option value="supervisor">Supervisor</option>
                </select>
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">
                <select class="form-select col-sm-12" name="tipoTrabajador">
                    <option selected>Obra</option>
                    <option value="tecnico">Técnico</option>
                    <option value="supervisor">Supervisor</option>
                </select>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="plano" class="col-sm-12"><input type="button" class="btn btn-secondary btn-user col-sm-12" style="margin-top:0;" value="Subir plano de la obra"</label>
                <input type="file" id="plano" name="plano" hidden>

            </div>
        </div>
            <div class="form-group row">

                <div class="col-sm-12 mb-3 mb-sm-0">
                    <div id="toolbar-container"></div>
                    <div id="editor"></div>
                </div>


            </div>



            <a href="login.html" class="btn btn-primary btn-user btn-block">
                Enviar obra
            </a>
            <hr>

        </div>
    </form>
@endsection
