<div class="content-single">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile">
            <h3 class="mt-0 mb-15 color-brand-1">Mi Perfil</h3>
            <a class="font-md color-text-paragraph-2" href="#">
                Complete su perfil con los campos requeridos
            </a>

            <form action="{{ route('frontend.profile.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mt-35 mb-40 box-info-profie">
                            <div class="image-profile">
                                @if($user->photo)
                                    <img src="{{ $user->photo_url }}" alt="jobbox" id="photo-preview">
                                    <input type="file" id="photo" name="photo" class="form-control mb-4" hidden>
                                @else
                                    <img src="{{ asset('assets/frontend/imgs/photo-placeholder.jpg') }}" alt="jobbox" id="photo-preview">
                                    <input type="file" id="photo" name="photo" class="form-control mb-4" required hidden>
                                @endif
                            </div>
                            <a class="btn btn-apply" id="btn-select-photo">Subir Foto</a>
                            <a class="btn btn-link" id="btn-remove-photo">Remover</a>
                        </div>
                        @error('photo')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-35 mb-40 box-info-profie">
                            <div class="image-profile">
                                @if($candidate->banner)
                                    <img src="{{ $candidate->banner_url }}" alt="jobbox" id="banner-preview">
                                    <input type="file" id="banner" name="banner" class="form-control mb-4" hidden>
                                @else
                                    <img src="{{ asset('assets/frontend/imgs/banner-placeholder.jpg') }}" alt="jobbox" id="banner-preview">
                                    <input type="file" id="banner" name="banner" class="form-control mb-4" required hidden>
                                @endif
                            </div>
                            <a class="btn btn-apply" id="btn-select-banner">Subir Banner</a>
                            <a class="btn btn-link" id="btn-remove-banner">Remover</a>
                        </div>
                    </div>
                    @error('banner')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="row form-contact">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Sobre Mí</label>
                            <textarea class="form-control" rows="5" name="about_me"
                                      required>{{ old('about_me') ?? $candidate->about_me }}</textarea>
                            @error('about_me')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Nombre(s)</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') ??$user->name }}" required>
                            @error('name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Apellido(s)</label>
                            <input class="form-control" type="text" name="last_name" value="{{ old('last_name') ?? $user->last_name }}"
                                   required>
                            @error('last_name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Correo Electrónico</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') ?? $user->email }}" required>
                            @error('email')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Teléfono</label>
                            <input class="form-control" type="telephone" name="telephone"
                                   value="{{ old('telephone') ?? $candidate->telephone }}" required>
                            @error('telephone')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Ubicación</label>
                            <div class="form-group select-style select-style-icon">
                                <select name="city_id" id="city_id" class="form-control form-icons select-active" required>
                                    <option value="" selected disabled>Seleccione una ubicación</option>
                                    @foreach($cities as $city)
                                        @if(old('city_id'))
                                            <option value="{{ $city->id }}"
                                                    @if(old('city_id') == $city->id) selected @endif>{{ $city->department->name }}
                                                , {{ $city->name }}</option>
                                        @else
                                            <option value="{{ $city->id }}"
                                                    @if($candidate->city && $candidate->city->id == $city->id) selected @endif>{{ $city->department->name }}
                                                , {{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <i class="fi-rr-marker"></i>
                            </div>
                            @error('city_id')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Dirección</label>
                            <input class="form-control" type="address" name="address"
                                   value="{{ old('address') ?? $candidate->address }}" required>
                            @error('address')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Profesión</label>
                            <div class="form-group select-style select-style-icon">
                                <select name="profession_id" id="profession_id"
                                        class="form-control form-icons select-active" required>
                                    <option value="" selected disabled>Seleccione una profesión</option>
                                    @foreach($professions as $profession)
                                        @if(old('profession_id'))
                                            <option value="{{ $profession->id }}"
                                                    @if(old('profession_id') == $profession->id) selected @endif>{{ $profession->name }}</option>
                                        @else
                                            <option value="{{ $profession->id }}"
                                                    @if($candidate->profession && $candidate->profession->id == $profession->id) selected @endif>{{ $profession->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <i class="fi-rr-marker"></i>
                            </div>
                            @error('profession_id')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Experiencia</label>
                            <div class="form-group select-style select-style-icon">
                                <select name="experience_id" id="experience_id"
                                        class="form-control form-icons select-active" required>
                                    <option value="" selected disabled>Seleccione una experiencia</option>
                                    @foreach($experiences as $experience)
                                        @if(old('profession_id'))
                                            <option value="{{ $experience->id }}"
                                                    @if(old('experience_id') == $experience->id) selected @endif>{{ $experience->name }}</option>
                                        @else
                                            <option value="{{ $experience->id }}"
                                                    @if($candidate->experience && $candidate->experience->id == $experience->id) selected @endif>{{ $experience->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <i class="fi-rr-marker"></i>
                            </div>
                            @error('experience_id')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Expectativa Salarial (opcional)</label>
                            <input class="form-control" type="expected_salary" name="expected_salary"
                                   value="{{ old('expected_salary') ?? $candidate->expected_salary }}">
                            @error('expected_salary')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="box-button mt-30">
                            <button type="submit" class="btn btn-apply-big font-md font-bold">Guardar Perfil</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="skills-languages" role="tabpanel" aria-labelledby="skills-languages">
            <h3 class="mt-0 mb-15 color-brand-1">Mis Habilidades y Lenguajes</h3>
            <div class="row form-contact">
                <div class="col-lg-12 col-md-12">
                    <div class="box-skills">
                        <h5 class="mt-0 color-brand-1">Habilidades</h5>
                        <div class="form-contact">
                            <div class="form-group select-style select-style-icon">
                                <select name="skill_id" id="skill_id" class="form-control form-icons select-active">
                                    <option value="" selected disabled>Seleccione una habilidad</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fi-rr-marker"></i>
                            </div>
                        </div>
                        @if($candidate_skills->count() > 0)
                            <div class="box-tags mt-30 mb-20">
                                @foreach($candidate_skills as $candidate_skill)
                                    <a class="btn btn-grey-small mr-10">
                                        {{ $candidate_skill->skill->name }}
                                        <span class="close-icon" wire:click="deleteCandidateSkill({{ $candidate_skill->id }})"></span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <div class="mt-20">
                            <span class="card-info font-sm color-text-paragraph-2">Puedes agregar hasta 10 habilidades</span>
                        </div>
                    </div>

                    <div class="box-skills">
                        <h5 class="mt-0 color-brand-1">Lenguajes</h5>
                        <div class="form-contact">
                            <div class="form-group select-style select-style-icon">
                                <select name="language_id" id="language_id" class="form-control form-icons select-active">
                                    <option value="" selected disabled>Seleccione un lenguaje</option>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fi-rr-marker"></i>
                            </div>
                        </div>
                        @if($candidate_languages->count() > 0)
                            <div class="box-tags mt-30 mb-20">
                                @foreach($candidate_languages as $candidate_language)
                                    <a class="btn btn-grey-small mr-10">
                                        {{ $candidate_language->language->name }}
                                        <span class="close-icon"
                                              wire:click="deleteCandidateLanguage({{ $candidate_language->id }})"></span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <div class="mt-20">
                            <span class="card-info font-sm color-text-paragraph-2">Puedes agregar hasta 10 lenguajes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="cv" role="tabpanel" aria-labelledby="cv">
            <h3 class="mt-0 mb-15 color-brand-1">Mi Curriculum Vitae</h3>
            <a class="font-md color-text-paragraph-2" href="#">
                Suba su CV en formato PDF o genere un nuevo CV <span href="#" class="fw-bold text-primary">presionando aquí</span>
            </a>

            <div class="row">
                <div class="col-lg-12 mt-20">
                    <form id="form-resume" action="{{ route('frontend.profile.update_resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" name="resume" id="resume" hidden required accept="application/pdf">
                        <a class="btn btn-apply" id="btn-select-resume">Subir CV</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="applications">
            <h3 class="mt-0 mb-15 color-brand-1">Mis Aplicaciones</h3>
            <a class="font-md color-text-paragraph-2" href="#">
                Aquí puede ver las aplicaciones que has enviado
            </a>

            <div class="row display-list mt-20">
                @foreach($candidate->applications as $application)
                    <div class="col-xl-12 col-12"
                         onclick="window.location.href = '{{ route('frontend.offers.show', ['offer' => $application->offer->id]) }}'">
                        <div class="card-grid-2 hover-up cursor-pointer">
                            <span class="flash"></span>
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="card-grid-2-image-left">
                                        <div class="image-box"><img src="{{ $application->offer->company->photo_url }}" alt="jobBox"></div>
                                        <div class="right-info">
                                            <a class="name-job" href="">{{ $application->offer->company->name }}</a>
                                            <span class="text-profession p-0">
                                                {{ $application->offer->city->department->name }}, {{ $application->offer->city->name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block-info">
                                <h6>
                                    <a href="{{ route('frontend.offers.show', ['offer' => $application->offer->id]) }}">{{ $application->offer->title }}</a>
                                </h6>
                                <div class="mb-5">
                                    <span class="card-briefcase">{{ $application->offer->jobType->name }}</span>
                                    <span class="card-time">Exp. {{ $application->offer->experience->name }}</span>
                                    @if($application->offer->salary)
                                        <span class="card-time">{{ $application->offer->salary_formatted }} Gs.</span>
                                    @else
                                        <span class="card-time">Salario No Definido</span>
                                    @endif
                                    <span class="card-time"> {{ $application->offer->posted_at_time_ago }} </span>
                                </div>
                                <p class="font-xs color-text-paragraph-2 mt-2 mb-0">{{ $application->offer->description_trimmed_extended ?? 'Sin Descripción' }}</p>

                                <div class="card-2-bottom mt-30">
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <div class="btn btn-apply-now">
                                                <a href="#" class="text-primary text-apply-now" style="font-weight: 500;">
                                                    Ver Oferta
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password">
            <h3 class="mt-0 mb-15 color-brand-1">Reestablecer Contraseña</h3>
            <a class="font-md color-text-paragraph-2" href="#">
                Complete los campos para reestablecer su contraseña
            </a>
            <form action="{{ route('frontend.profile.update_password') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-contact mt-30">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Contraseña</label>
                            <input class="form-control" type="password" name="password" required>
                            @error('password')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Confirmar Contraseña</label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                            @error('password_confirmation')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="box-button mt-30">
                            <button type="submit" class="btn btn-apply-big font-md font-bold">Reestablecer Contraseña</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(function () {
            document.getElementById("resume").onchange = function() {
                document.getElementById("form-resume").submit();
            };

            $('#btn-select-resume').on('click', function () {
                $('#resume').click();
            });

            $('#btn-select-photo').on('click', function () {
                $('#photo').click();
            });

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

            $('#btn-select-banner').on('click', function () {
                $('#banner').click();
            })

            $('#btn-remove-banner').on('click', function () {
                $('#banner').val('');
                $('#banner-preview').attr('src', '{{ asset('assets/backend/imgs/banner-placeholder.jpg') }}');
            });

            $("#banner").change(function () {
                readBannerURL(this);
            });

            function readBannerURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#banner-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#skill_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('skill_selected', data);

                Livewire.emit('skillSelected');
            });

            $('#language_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('language_selected', data);

                Livewire.emit('languageSelected');
            });

            window.addEventListener('skillExists', (e) => {
                swalFire('error', 'Ésta habilidad ya está registrada')
            });

            window.addEventListener('skillLimitReached', (e) => {
                swalFire('error', 'No puede registrar más de 10 habilidades')
            });

            window.addEventListener('languageExists', (e) => {
                swalFire('error', 'Este lenguaje ya está registrado')
            });

            window.addEventListener('contentChanged', (e) => {
                $('.select-active').select2();
            });
        });
    </script>
@endsection
