@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Trabajadores') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.trabajadores') }}">
                        @csrf
                        <input type="text" name="email" placeholder="email" value="{{ old("email") }}"><br>
                        <input type="password" name="password" placeholder="password"><br>
                        <input type="password" name="password_confirmation" placeholder="Repeat the password"><br>
                        <input type="text" name="name" placeholder="name" value="{{ old("name") }}"><br>
                        <input type="text" name="surname" placeholder="surname" value="{{ old("surname") }}"><br>
                        <input type="text" name="dni" placeholder="dni" value="{{ old("dni") }}"><br>
                        <select name="role">
                            <option value="coordinador">Coordinador</option>
                            <option value="tecnico">Tecnico</option>
                        </select>

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