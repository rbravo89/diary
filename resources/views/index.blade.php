@extends('layouts.app')
@section('title')
    Index
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Proyectos
        @endslot
    @endcomponent
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                       <i data-feather="clock" class="text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                        Planificación</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0">
                                            <span class="counter-value"
                                                  data-target="{{$projects->where('state','PLANIFICATION')->count()}}">
                                                0</span>
                                        </h4>
                                        <span class="badge bg-success-subtle text-success fs-12">
                                            <i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>
                                            {{($projects->where('state','PLANIFICATION')->count()*100)/($projects->count())}}%
                                        </span>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Total de proyectos</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                        <i data-feather="award" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Ejecución</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                                data-target="{{$projects->where('state','EXECUTION')->count()}}">0</span>
                                        </h4>
                                        <span class="badge bg-success-subtle text-success fs-12">
                                            <i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>
                                            {{($projects->where('state','EXECUTION')->count()*100)/($projects->count())}}%
                                        </span>
                                    </div>
                                    <p class="text-muted mb-0">Total de proyectos en ejecución</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                        <i data-feather="alert-triangle" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Evaluación</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                                data-target="{{$projects->where('state','EVALUATION')->count()}}">0</span>
                                        </h4>
                                        <span class="badge bg-success-subtle text-success fs-12">
                                            <i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>
                                            {{($projects->where('state','EVALUATION')->count()*100)/($projects->count())}}%
                                        </span>
                                    </div>
                                    <p class="text-muted mb-0">Total de proyectos en evaluación</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                        <i data-feather="star" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Cierre</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                                data-target="{{$projects->where('state','CLOSE')->count()}}">0</span>
                                        </h4>
                                        <span class="badge bg-success-subtle text-success fs-12">
                                            <i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>
                                            {{($projects->where('state','CLOSE')->count()*100)/($projects->count())}}%
                                        </span>
                                    </div>
                                    <p class="text-muted mb-0">Total de proyectos en cierre</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->


            </div><!-- end row -->
        </div>
    </div>
    </div>
@endsection
