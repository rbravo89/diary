@extends('layouts.app-without-nav')
@section('title')
    Inicio de sesión
@endsection
@section('content')

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-7 col-xl-6">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Crear una nueva cuenta !</h5>
                                    <p class="text-muted">Obtenga su cuenta gratuita ahora.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{route('register.store')}}"
                                          method="POST"
                                          class="needs-validation"
                                          novalidate>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="business-name" class="form-label">Razon Social de la
                                                Organización</label>
                                            <input id="business-name"
                                                   type="text"
                                                   class="form-control @error('business-name') is-invalid @enderror"
                                                   name="business-name"
                                                   required
                                                   placeholder="Ingrese la razon social"
                                                   value="{{old('business-name')}}">
                                            @error('business-name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="ruc" class="form-label">Ruc</label>
                                            <input id="ruc"
                                                   type="text"
                                                   class="form-control @error('ruc') is-invalid @enderror"
                                                   name="ruc"
                                                   required
                                                   placeholder="Ingrese el ruc"
                                                   value="{{old('ruc')}}">
                                            @error('ruc')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label for="names" class="form-label">Nombres</label>
                                                <input id="names"
                                                       type="text"
                                                       class="form-control @error('names') is-invalid @enderror"
                                                       name="names"
                                                       required
                                                       placeholder="Ingres sus nombres"
                                                       value="{{old('names')}}">
                                                @error('names')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="surname" class="form-label">Apellidos</label>
                                                <input id="surname"
                                                       type="text"
                                                       class="form-control @error('surnames') is-invalid @enderror"
                                                       name="surname"
                                                       required
                                                       placeholder="Ingrese sus apellidos"
                                                       value="{{old('surname')}}">
                                                @error('surname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email"
                                                   type="text"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   required
                                                   placeholder="Ingrese un email"
                                                   value="{{old('email')}}">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input id="password"
                                                           type="password"
                                                           name="password"
                                                           required
                                                           class="form-control pe-5 password-input"
                                                           placeholder="Ingresa un password">
                                                    @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <button id="password-addon"
                                                            class="btn btn-link position-absolute end-0 top-0
                                                                    text-decoration-none text-muted password-addon"
                                                            type="button">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="password_confirmation">Repetir
                                                    Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input id="password_confirmation"
                                                           type="password"
                                                           name="password_confirmation"
                                                           required
                                                           class="form-control pe-5 password-input"
                                                           placeholder="Repite tu password">
                                                    <button
                                                            class="btn btn-link position-absolute
                                                    end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Registrarme</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">¿Ya tienes una cuenta ?
                                <a href="{{ route('login') }}"
                                   class="fw-semibold text-primary text-decoration-underline">
                                    Iniciar sesión </a>
                            </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Plataforma Colaborativa. desarrollada por Virtualland</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

@endsection
@section('script')
    <script src="{{ URL::asset('libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('js/pages/password-addon.init.js') }}"></script>
@endsection

