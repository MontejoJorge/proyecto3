@extends('layout')

@section('titulo', 'Nuevo Usuario')

@section('contenido')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Registro de nuevos Usuarios</h1>



    </div>
    <form class="user  p-3">

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="name" id="name"
                       placeholder="Nombre...">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="surname" name="surname"
                       placeholder="Apellido...">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="dni" name="dni"
                       placeholder="DNI...">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="pass" name="pass"
                       placeholder="Contraseña...">
            </div>


        </div>

        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0 " id="seleccion">
                <select class="form-select col-sm-12" name="tipoTrabajador">
                    <option selected>Selecciona una opción...</option>
                    <option value="tecnico">Técnico</option>
                    <option value="supervisor">Supervisor</option>

                </select>
            </div>




            <a href="login.html" class="btn btn-primary btn-user btn-block">
                Añadir usuario
            </a>
            <hr>

        </div>
    </form>
@endsection
