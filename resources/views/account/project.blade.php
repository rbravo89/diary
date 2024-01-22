@extends('layouts.app')
@section('title')
    Proyectos
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Cuenta
        @endslot
        @slot('title')
            Proyectos
        @endslot
    @endcomponent
    <!--<div class="row g-4 mb-3">-->
    <div class="col-sm-auto">
        <div>
            <a href="{{route('account.projects.create')}}" class="btn btn-success">
                <i class="ri-add-line align-bottom me-1"></i>
                Agregar Nuevo
            </a>
        </div>
    </div>
    <p/>
    <div class="row">
        @foreach($items as $item)
            <div class="col-xxl-3 col-sm-6 project-card">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <div class="flex-grow-1">

                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex gap-1 align-items-center">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i data-feather="more-horizontal" class="icon-sm"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                   href="{{route('account.projects.edit',$item)}}"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Editar</a>

                                                <a class="dropdown-item"
                                                   href="{{route('account-project-requirement',$item)}}">
                                                    <i class="ri-advertisement-fill align-bottom me-2 text-muted"></i>
                                                    Requerimentos</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#removeProjectModal"><i
                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                    <span class="avatar-title bg-warning-subtle rounded p-2">
                                        <img src="{{ asset('images/project.png') }}" alt=""
                                             class="img-fluid p-1">
                                    </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fs-15"><a href="apps-projects-overview"
                                                              class="text-body">{{$item->name}}</a></h5>
                                    <p class="text-muted text-truncate-two-lines mb-3">{{$item->objective}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card body -->
                    <div class="card-footer bg-transparent border-top-dashed py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="text-muted">
                                    Inicio
                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i>
                                    {{$item->start_date}}
                                </div>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="text-muted">
                                    Finalización
                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i>
                                    {{$item->end_date}}
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end card footer -->
                </div>
            </div>
        @endforeach
    </div>

@endsection
