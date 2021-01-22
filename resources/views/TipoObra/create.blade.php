@extends('layouts.app')

@section('content')
    <div class="container">
        <Form method="POST" action="{{ route("tipoObra.crear") }}">
            @csrf
            <label for="">Tipo Obra</label>
            <input type="text" name="tipoObra" value="{{ old("tipoObra") }}"><br>
            <input type="submit" value="Crear">
        </Form>
        @if ($errors->any())
            @foreach ($errors->all() as $e)
                {{ $e }}
            @endforeach
        @endif
    </div>


@endsection