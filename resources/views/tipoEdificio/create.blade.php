@extends('layouts.app')

@section('content')
    <div class="container">
        <Form method="POST" action="{{ route("tipoEdificio.store") }}">
            @csrf
            <label for="">Tipo edificio</label>
            <input type="text" name="tipoEdificio"><br>
            <input type="submit" value="Crear">
        </Form>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            {{ $e }}
        @endforeach
    @endif

@endsection