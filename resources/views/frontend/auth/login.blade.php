@extends('frontend.layouts.guest')
@section('title', 'Inicia Sesión')
@section('content')
    <section class="pt-50 login-register">
        <div class="container">
            <div class="login-register-cover">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center">
                            <h2 class="mt-10 mb-5 text-brand-1">Inicia Sesión</h2>
                            <div class="divider-text-center"><span></span></div>
                        </div>
                        <form class="login-register text-start mt-20" action="{{ route('frontend.authenticate') }}" method="POST"
                              autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="input-1">Correo Electrónico</label>
                                <input class="form-control" id="input-1" type="text" required="" name="email"
                                       placeholder="usuario@caerus.com" value="democandidate@caerus.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-4">Contraseña</label>
                                <input class="form-control" id="input-4" type="password" required="" name="password" placeholder="**********" value="password">
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox"><span class="text-small">Remember me</span><span class="checkmark"></span>
                                </label><a class="text-muted" href="#">Olvidé mi contraseña</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Ingresar</button>
                            </div>
                            <div class="text-muted text-center">¿No tienes una cuenta?
                                <a href="{{ route('frontend.register') }}">¡Crea una ahora!</a>
                            </div>

                            <hr>
                            <p>
                                Autocompletamos los campos con un usuario!
                                <br>
                                <br>
                                <span class="text-primary fw-bold">Usuario Candidato:</span> democandidate@caerus.com
                                <br>
                                <span class="text-primary fw-bold">Contraseña:</span> password
                            </p>
                        </form>
                    </div>
                    <div class="img-1 d-none d-lg-block">
                        <img class="shape-1" src="{{ asset('assets/frontend/imgs/page/login-register/img-4.svg') }}" alt="JobBox">
                    </div>
                    <div class="img-2">
                        <img src="{{ asset('assets/frontend/imgs/page/login-register/img-3.svg') }}" alt="JobBox">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
