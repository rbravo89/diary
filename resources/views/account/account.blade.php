@extends('layouts.app')
@section('title')
    Perfil
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" alt="" class="profile-wid-img"/>
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img
                            src="{{ asset('images/avatar.png') }}"
                            alt="user-img" class="img-thumbnail rounded-circle"/>
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{auth()->user()->name}} {{auth()->user()->surname}}</h3>
                    <p class="text-white text-opacity-75">Administrador de cuenta</p>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#organization-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                        class="d-none d-md-inline-block">Organización</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#personal-settings-tab"
                               role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                        class="d-none d-md-inline-block">Información Personal</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{route('account.edit',$user)}}" class="btn btn-success"><i
                                    class="ri-edit-box-line align-bottom"></i> Editar Perfil</a>
                    </div>
                </div>
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="organization-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Organización</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Nombre :</th>
                                                    <td class="text-muted">{{$user->organization->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Ruc :</th>
                                                    <td class="text-muted">{{$user->organization->ruc}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Ubicación :</th>
                                                    <td class="text-muted">{{$user->organization->location}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Sitio web :</th>
                                                    <td class="text-muted">{{$user->organization->site_web}}</td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="personal-settings-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Información Personal</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Nombres :</th>
                                                    <td class="text-muted">{{$user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Apellidos :</th>
                                                    <td class="text-muted">{{$user->surname}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Email :</th>
                                                    <td class="text-muted">{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Teléfono :</th>
                                                    <td class="text-muted">{{$user->phone}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
