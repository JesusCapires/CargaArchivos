@extends('layouts.authentication')

@section('title', 'Iniciar Sesión')

@section('content')
    <p class="h5 fw-semibold mb-2">Iniciar sesión</p>
    <p class="mb-3 text-muted op-7 fw-normal">Bienvenido a Qualtum!</p>
    <form action="{{ route("verificarCredenciales") }}" method="POST" id="login">
        @csrf
        <div class="row gy-3 mt-5">
            <div class="col-xl-12 mt-0">
                <label for="signin-username" class="form-label text-default">Correo</label>
                <input type="email" class="form-control form-control-lg" placeholder="Correo" name="email" id="email" required>
                @error('email')
                    <div class="form-text text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-xl-12 mb-3">
                <label for="signin-password" class="form-label text-default d-block">Contraseña<a href="{{ route('register') }}" class="float-end text-danger">Olvidaste tu contraseña?</a></label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Contraseña" name="password" id="password" required>
                    <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                </div>
            </div>
            <div class="col-xl-12 d-grid mt-2">
                {{-- <a href="{{route('dashq')}}"  class="btn btn-orange btn-raised-shadow btn-wave">Iniciar Sesión</a> --}}
                <button type="submit" class="btn btn-orange btn-raised-shadow btn-wave">
                    Iniciar sesión
                </button>
            </div>
        </div>
    </form>

@endsection
