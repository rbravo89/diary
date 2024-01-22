@extends('layouts.app')
@section('title')
    Perfil
@endsection
@section('content')
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{asset('images/avatar.png')}}"
                                 class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                                 alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{$user->name}} {{$user->surname}}</h5>
                        <p class="text-muted mb-0">{{$user->role}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Detalles Personales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>
                                Cambiar contraseña
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form method="POST" action="{{route('admin.user.update',$user)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombres</label>
                                            <input id="name"
                                                   name="name"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Ingrese su nombre"
                                                   value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="surname" class="form-label">Apellidos</label>
                                            <input id="surname"
                                                   name="surname"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Ingrese sus apellidos"
                                                   value="{{$user->surname}}">
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
                                                   value="{{$user->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email"
                                                   type="email"
                                                   name="email"
                                                   disabled
                                                   class="form-control"
                                                   placeholder="Ingrese email"
                                                   value="{{$user->email}}">
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
                                                   value="{{$user->position}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <a class="btn btn-danger" href="{{route('admin.user')}}">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form method="POST" action="{{route('admin.user.password',$user)}}" class="needs-validation"
                                  novalidate>
                                @csrf
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="password-confirmed" class="form-label">Repite
                                                Password*</label>
                                            <input id="password-confirmed"
                                                   type="password"
                                                   class="form-control"
                                                   name="password-confirmed"
                                                   placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit"
                                                    class="btn btn-success">Actualizar
                                                Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
