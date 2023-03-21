@extends('frontend.layouts.app')
@section('title', 'Mi Cuenta')
@section('content')
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single">
                @if($candidate->banner)
                    <img src="{{ $candidate->banner_url }}" alt="jobbox" height="350">
                @else
                    <img src="{{ asset('assets/frontend/imgs/banner-placeholder.jpg') }}" alt="jobbox" height="350">
                @endif
            </div>
            <div class="box-company-profile">
                <div class="image-compay">
                    <img src="{{ $user->photo_url }}" alt="jobbox">
                </div>
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-18">{{ $user->name }} {{ $user->last_name }}
                            <span class="card-location font-regular ml-20">
                                @if($candidate->city)
                                    {{ $candidate->city->department->name }},
                                    {{ $candidate->city->name }}
                                @else
                                    -
                                @endif
                            </span>
                        </h5>
                        <p class="mt-0 font-md color-text-paragraph-2 mb-15">
                            @if($candidate->profession)
                                {{ $candidate->profession->name }} ({{ $candidate->experience->name }})
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        @if($candidate->resume_url)
                            <a class="btn btn-download-icon btn-apply btn-apply-big" href="{{ $candidate->resume_url }}" target="_blank">
                                Descargar CV
                            </a>
                        @else
                            <a class="btn btn-download-icon btn-apply btn-apply-big" href="javascript:void(0);" onclick="$('#btn-select-resume').click();">
                                Subir CV
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="box-nav-tabs nav-tavs-profile mb-5">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="btn btn-border aboutus-icon mb-20 active" href="#profile" data-bs-toggle="tab" role="tab"
                                   aria-controls="profile" aria-selected="true">
                                    Mi Perfil
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-border recruitment-icon mb-20" href="#skills-languages" data-bs-toggle="tab" role="tab"
                                   aria-controls="skills-languages" aria-selected="false">
                                    Mis Habilidades y Lenguajes
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-border recruitment-icon mb-20" href="#cv" data-bs-toggle="tab" role="tab"
                                   aria-controls="cv" aria-selected="false" id="nav-tab-cv">
                                    Mi Curriculum Vitae
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-border people-icon mb-20" href="#applications" data-bs-toggle="tab" role="tab"
                                   aria-controls="applications" aria-selected="false">
                                    Mis Aplicaciones
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-border recruitment-icon mb-20" href="#change-password" data-bs-toggle="tab" role="tab"
                                   aria-controls="change-password" aria-selected="false">
                                    Reestablecer Contraseña
                                </a>
                            </li>
                        </ul>
                        <div class="border-bottom pt-10 pb-10"></div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">

                    <livewire:frontend.profile-index/>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('#btn-select-photo').on('click', function () {
            $('#photo').click();
        })

        $('#btn-remove-photo').on('click', function () {
            $('#photo').val('');
            $('#photo-preview').attr('src', '{{ asset('assets/backend/imgs/photo-placeholder.jpg') }}');
        });

        $("#photo").change(function () {
            readPhotoURL(this);
        });

        function readPhotoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
