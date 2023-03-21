@extends('frontend.layouts.guest')
@section('title', 'Crea tu cuenta')
@section('content')
    <main class="main">
        <section class="pt-50 login-register">
            <div class="container">
                <div class="login-register-cover">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                            <div class="text-center">
                                <h2 class="mt-10 mb-5 text-brand-1">Crea tu cuenta</h2>
                                <div class="divider-text-center"><span></span></div>
                            </div>
                            <form class="login-register text-start mt-20" action="{{ route('frontend.create_account') }}" method="POST"
                                  autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="input-1">Nombres</label>
                                    <input class="form-control" id="input-1" type="text" required="" name="name" value="{{ old('name') }}"
                                           placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="input-1">Apellidos</label>
                                    <input class="form-control" id="input-1" type="text" required="" name="last_name" value="{{ old('last_name') }}"
                                           placeholder="Smith">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="input-1">Correo Electrónico</label>
                                    <input class="form-control" id="input-1" type="emai" required="" name="email" value="{{ old('email') }}"
                                           placeholder="johndoe@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="input-4">Contraseña</label>
                                    <input class="form-control" id="input-4" type="password" required="" name="password"
                                           placeholder="************">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="input-4">Confirmar Contraseña</label>
                                    <input class="form-control" id="input-4" type="password" required="" name="password_confirmation"
                                           placeholder="************">
                                </div>
                                <div class="login_footer form-group d-flex justify-content-between">
                                    <label class="cb-container">
                                        <input type="checkbox" required>
                                        <span class="text-small">Acepto los términos y condiciones</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Registrarme</button>
                                </div>
                                <div class="text-muted text-center">¿Ya tienes una cuenta?
                                    <a href="{{ route('frontend.login') }}">¡Ingresa ahora!</a>
                                </div>
                            </form>
                        </div>
                        <div class="img-1 d-none d-lg-block">
                            <img class="shape-1" src="{{ asset('assets/frontend/imgs/page/login-register/img-1.svg') }}" alt="JobBox">
                        </div>
                        <div class="img-2">
                            <img src="{{ asset('assets/frontend/imgs/page/login-register/img-2.svg') }}" alt="JobBox">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
