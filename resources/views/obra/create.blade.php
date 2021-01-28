@extends('layouts.app')
@section('content')
<script src="//www.google.com/recaptcha/api.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear una obra') }}</div>
                <div class="card-body">
                    @if (session("status"))
                    <p>{{ session("status") }}</p>
                    @endif  
                    <form method="POST" action="{{ route('obra.store') }}" enctype="multipart/form-data">
                        @csrf
                        @empty($tiposObras)
                        <a href="{{ route("tipoObra.crear") }}">No hay tipos de obras, crear</a>
                        @else 
                        <select name="tipoObra">
                            @foreach ($tiposObras as $i)
                                <option value="{{ $i->id }}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                        @endempty
                                <br>


                        @empty($tiposEdificios)
                        <a href="{{ route("tipoEdificio.crear") }}">No hay tipos de edificio, crear</a>
                        @else 
                        <select name="tipoEdificio">
                            @foreach ($tiposEdificios as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                            @endforeach
                        </select>  
                        @endempty
                        

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
                        <br>
                        {!! NoCaptcha::display() !!}
                        <input type="submit" value="Enviar">
                    </form>
                    <p>{{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection