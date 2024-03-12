@extends('layouts.authentication')

@section('title', 'Registro')

@section('content')
    <p class="h5 fw-semibold mb-2">Crear Usuario</p>
    <p class="mb-3 text-muted op-7 fw-normal">Bienvenido a Qualtum!</p>
    <div class="row gy-3 mt-5">
        <div class="col-xl-12 mt-0">
            <label for="signin-username" class="form-label text-default">Usuario</label>
            <input type="text" class="form-control form-control-lg" id="usuario" placeholder="usuario" name="usuario">
        </div>
        <div class="col-xl-12 mb-3">
            <label for="signin-password" class="form-label text-default d-block">Contraseña<a href="reset-password-cover.html" class="float-end text-danger">Olvidaste tu contraseña?</a></label>
            <div class="input-group">
                <input type="password" class="form-control form-control-lg" id="password" placeholder="contraseña" name="password">
                <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
            </div>
            <div class="mt-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                        Recordar contraeña ?
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xl-12 d-grid mt-2">
            {{-- <a href="{{route('dashq')}}"  class="btn btn-orange btn-raised-shadow btn-wave">Iniciar Sesión</a> --}}
            <button type="submit" class="btn btn-orange btn-raised-shadow btn-wave">
                Iniciar sesión
            </button>
        </div>
    </div>
@endsection
