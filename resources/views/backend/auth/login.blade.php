@extends('backend.layouts.guest')
@section('title', 'Acceso Backend')
@section('content')
    <main class="main">
        <section class="pt-100 login-register">
            <div class="container">
                <div class="login-register-cover">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                            <div class="text-center">
                                <img alt="jobBox" src="{{ asset('assets/backend/imgs/logo-big.png') }}" width="250">
                                <h2 class="mt-10 mb-5 text-brand-1">Acceso Backend</h2>
                                <p class="font-sm text-muted mb-30">Ingrese sus credenciales para continuar al backend</p>
                                <div class="divider-text-center"><span></span></div>
                            </div>

                            <form class="login-register text-start mt-20" action="{{ route('backend.authenticate') }}" method="POST"
                                  autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="input-1">Correo Electrónico</label>
                                    <input class="form-control" id="input-1" type="text" required="" name="email"
                                           placeholder="usuario@caerus.com" value="{{ old('email') ?? 'bancobasa@caerus.com' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="input-4">Contraseña</label>
                                    <input class="form-control" id="input-4" type="password" required="" name="password" placeholder="************" value="password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Ingresar</button>
                                </div>
                            </form>
                            <hr>
                            <p>
                                Autocompletamos los campos con un usuario!
                                <br>
                                Opcionalmente, puede ingresar con estos otros usuarios.
                                <br>
                                <br>
                                <span class="text-primary fw-bold">Usuario Administrador:</span> admin@caerus.com
                                <br>
                                <span class="text-primary fw-bold">Usuario Empresa:</span> bancobasa@caerus.com
                                <br>
                                <span class="text-primary fw-bold">Contraseña:</span> password
                            </p>
                        </div>
                        <div class="img-1 d-none d-lg-block"><img class="shape-1"
                                                                  src="{{ asset('assets/frontend/imgs/page/login-register/img-4.svg') }}"
                                                                  alt="JobBox"></div>
                        <div class="img-2"><img src="{{ asset('assets/frontend/imgs/page/login-register/img-3.svg') }}" alt="JobBox"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
