@extends('layouts.layout')
@section('titulo', 'Nueva Obra')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulario de nueva obra</h1>

    </div>
    <!-- /.container-fluid -->
    <form class="user  p-3" method="POST" action="{{ route('obra.store') }}">
        @csrf
        <div class="form-group ">
            <input type="search" class="form-control form-control-user" id="address-input"
                   placeholder="Direccion...">
            <input type="text" id="city" name="city" value="{{ old("city") }}" placeholder="city" hidden>
            <input type="text" id="province" name="province" value="{{ old("province") }}" placeholder="province" hidden>
            <input type="text" id="postal_code" name="postal_code" value="{{ old("postal_code") }}" placeholder="postal_code" hidden>
            <input type="text" id="street_name" name="street_name" value="{{ old("street_name") }}" placeholder="street_name" hidden>
            <input type="text" id="latitude" name="latitude" value="{{ old("latitude") }}" placeholder="latitude" hidden>
            <input type="text" id="longitude" name="longitude" value="{{ old("longitude") }}" placeholder="longitude" hidden>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="num"
                       placeholder="Numero" name="number" value="{{ old("number") }}">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="piso"
                       placeholder="Piso" name="floor" value="{{old("floor")}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="mano"
                       placeholder="Mano" name="door" value="{{old("door")}}">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select class="form-select col-sm-12" name="building_type">
                    <option disabled selected>Edificio</option>
                    {{--Sacar los tipos de edificio de la BBDD--}}
                </select>
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">
                <select class="form-select col-sm-12" name="construction_type">
                    <option disabled selected>Obra</option>
                    {{--Sacar los tipos de obra de la BBDD--}}
                </select>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="plano" class="col-sm-12"><input type="button" class="btn btn-secondary btn-user col-sm-12" style="margin-top:0;" value="Subir plano de la obra"></label>
                <input type="file" id="plano" name="blueprint" value="{{old("blueprint")}}" hidden>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea class="form-control" rows="5" style="resize: none;" name="description">{{old("description")}}</textarea>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $e)
                {{ $e }}
            @endforeach
        @endif

        <button type="submit" class="btn btn-primary btn-user btn-block" id="registrar">
            {{ __('Send construction') }}
        </button>

        <hr>

        </div>
    </form>

@endsection
