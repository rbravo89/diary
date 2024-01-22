@extends('layouts.app')
@section('title')
    Perfil
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Administración
        @endslot
        @slot('title')
            Crear Usuario
        @endslot
    @endcomponent

    <form method="POST" action="{{route('admin.user.store')}}" class="needs-validate" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Nombres</label>
                                <input id="name"
                                       name="name"
                                       type="text"
                                       class="form-control"
                                       placeholder="Ingrese su nombre"
                                       value="{{old('name')}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Apellidos</label>
                                    <input id="surname"
                                           name="surname"
                                           type="text"
                                           class="form-control"
                                           placeholder="Ingrese sus apellidos"
                                           value="{{old('surname')}}">
                                    @error('surname')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Número de telefono</label>
                                    <input id="phone"
                                           name="phone"
                                           type="text"
                                           class="form-control"
                                           placeholder="Ingrese su número de telefono"
                                           value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Ingrese email"
                                           value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Posición</label>
                                    <input id="position"
                                           name="position"
                                           type="text"
                                           class="form-control"
                                           placeholder="Ingresa tu posición"
                                           value="{{old('position')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rol</label>
                                    <select id="role"
                                            class="form-select"
                                            name="rol"
                                            required
                                            data-value="{{old('rol')}}">
                                        <option value="{{null}}">--Seleccione--</option>
                                        <option value="ADMINISTRATOR">Administrador</option>
                                        <option value="TECHNICAL">Técnico</option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
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
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <a class="btn btn-danger" href="{{route('admin.user')}}">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
@endsection
