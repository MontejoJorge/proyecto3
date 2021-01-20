@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="text" name="email" placeholder="email" value="{{ old("email") }}"><br>
                        <input type="password" name="password" placeholder="password" value="{{ old("password") }}"><br>
                        <input type="password" placeholder="Repeat the password" value="{{ old("") }}"><br>
                        <input type="number" name="phone" placeholder="phone" value="{{ old("number") }}"><br>
                        <input type="text" name="name" placeholder="name" value="{{ old("name") }}"><br>
                        <input type="text" name="surname" placeholder="surname" value="{{ old("surname") }}"><br>
                        <input type="text" name="dni" placeholder="dni" value="{{ old("dni") }}"><br>
                        <input type="date" name="birthdate" placeholder="birthdate" value="{{ old("birthdate") }}"><br>
                        <input type="text" name="place_of_birth" placeholder="place_of_birth" value="{{ old("place_of_birth") }}"><br>
                        <input type="text" name="postal_code" placeholder="postal_code" value="{{ old("postal_code") }}"><br>
                        <input type="text" name="street_name" placeholder="street_name" value="{{ old("street_name") }}"><br>
                        <input type="number" name="number" placeholder="number" value="{{ old("number") }}"><br>
                        <input type="text" name="floor" placeholder="floor" value="{{ old("floor") }}"><br>
                        <input type="text" name="door" placeholder="door" value="{{ old("door") }}"><br>
                        <input type="text" name="city" placeholder="city" value="{{ old("city") }}"><br>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
