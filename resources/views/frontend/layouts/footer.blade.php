<footer class="footer mt-50">
    <div class="container">
        <div class="row text-center">
            <div class="footer-col-12 col-md-12 col-sm-12">
                <a href="{{ route('frontend.home.index') }}">
                    <img alt="jobBox" src="{{ asset('assets/frontend/imgs/logo-big.png') }}" style="max-height: 50px;">
                </a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2">
                    La mejor manera de conseguir to nuevo empleo
                </div>
                <div class="footer-social">
                    <a class="icon-socials icon-facebook" href="#"></a>
                    <a class="icon-socials icon-twitter" href="#"></a>
                    <a class="icon-socials icon-linkedin" href="#"></a>
                </div>
            </div>
{{--            <div class="footer-col-2 col-md-2 col-xs-6">--}}
{{--                <h6 class="mb-20">--}}
{{--                    <a href="{{ route('frontend.home.index') }}">Inicio</a>--}}
{{--                </h6>--}}
{{--            </div>--}}
{{--            <div class="footer-col-3 col-md-2 col-xs-6">--}}
{{--                <h6 class="mb-20">--}}
{{--                    <a href="{{ route('frontend.offers.index') }}">Buscar Ofertas</a>--}}
{{--                </h6>--}}
{{--            </div>--}}
{{--            <div class="footer-col-4 col-md-2 col-xs-6">--}}
{{--                <h6 class="mb-20">--}}
{{--                    <a href="{{ route('frontend.quick_offers.index') }}">Ofertas Rapidas</a>--}}
{{--                </h6>--}}
{{--            </div>--}}
{{--            <div class="footer-col-5 col-md-2 col-xs-6">--}}
{{--                <h6 class="mb-20">--}}
{{--                    <a href="{{ route('frontend.candidates.index') }}">Candidatos</a>--}}
{{--                </h6>--}}
{{--            </div>--}}
{{--            <div class="footer-col-6 col-md-3 col-sm-12">--}}
{{--                <h6 class="mb-20">Descargar la App</h6>--}}
{{--                <p class="color-text-paragraph-2 font-xs">Descarga nuestra App y mantente actualizada con las últimas ofertas laborales!</p>--}}
{{--                <div class="mt-15">--}}
{{--                    <a class="mr-5" href="#">--}}
{{--                        <img src="{{ asset('assets/frontend/imgs/template/icons/app-store.png') }}" alt="joxBox">--}}
{{--                    </a>--}}
{{--                    <a href="#">--}}
{{--                        <img src="{{ asset('assets/frontend/imgs/template/icons/android.png') }}" alt="joxBox">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6">
                    <span class="font-xs color-text-paragraph">
                        Copyright &copy; {{ date('Y') }} Caerus
                    </span>
                </div>
                <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social">
                        <a class="font-xs color-text-paragraph" href="#">Políticas de Privacidad</a>
                        <a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Términos & Condiciones</a>
                        <a class="font-xs color-text-paragraph" href="#">Seguridad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
