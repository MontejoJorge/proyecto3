@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.worker.register') }}">
                        @csrf
                        <input type="password" name="password" placeholder="password" value="{{ old("password") }}"><br>
                        <input type="password" placeholder="Repeat the password" value="{{ old("") }}"><br>
                        <input type="number" name="phone" placeholder="phone" value="{{ old("number") }}"><br>
                        <input type="text" name="name" placeholder="name" value="{{ old("name") }}"><br>
                        <input type="text" name="surname" placeholder="surname" value="{{ old("surname") }}"><br>
                        <input type="text" name="dni" placeholder="dni" value="{{ old("dni") }}"><br>

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
