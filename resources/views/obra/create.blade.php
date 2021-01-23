@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear una obra') }}</div>
                <div class="card-body">
                    @if (session("status"))
                    <p>{{ session("status") }}</p>
                    @endif  
                    <form method="POST" action="{{ route('obra.store') }}">
                        @csrf

                        @forelse ($tiposObras as $i)
                            <select name="tipoObra">
                                <option value="{{ $i->id }}">{{ $i->name }}</option>
                            </select>
                        @empty
                            <p>No hay tipos de obras, primero crea una 
                                <a href="{{ route("tipoObra.crear") }}"  target="_blank">Crear</a>
                            </p>
                        @endforelse
                                <br>
                        @forelse ($tiposEdificios as $i)
                        <select name="tipoEdificio">
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                        </select>
                        @empty
                            <p>No hay tipos de edificios, primero crea una 
                                <a href="{{ route("tipoEdificio.crear") }}" target="_blank">Crear</a>
                            </p>
                        @endforelse
                            <br>
                        <input type="text" name="postal_code" placeholder="postal_code" value="{{ old("postal_code") }}"><br>
                        <input type="text" name="street_name" placeholder="street_name" value="{{ old("street_name") }}"><br>
                        <input type="number" name="number" placeholder="number" value="{{ old("number") }}"><br>
                        <input type="text" name="floor" placeholder="floor" value="{{ old("floor") }}"><br>
                        <input type="text" name="door" placeholder="door" value="{{ old("door") }}"><br>
                        <input type="text" name="city" placeholder="city" value="{{ old("city") }}"><br>
                        <input type="text" name="province" placeholder="province" value="{{ old("province") }}"><br>
                        <textarea name="description" >
                            {{ old("description") }}
                        </textarea><br>
                        <input type="file" name="blueprint">

                    @if ($errors->any())
                        @foreach ($errors->all() as $e)
                            {{ $e }}
                        @endforeach
                    @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>{{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection