@extends('layouts.app')
@section('title')
    @lang('translation.overview')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-warning-subtle">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ asset('images/project.png') }}" alt=""
                                                     class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">{{$project->name}}</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div>
                                                    <i class="ri-building-line align-bottom me-1"></i>{{$project->location}}
                                                </div>
                                                <div class="vr"></div>
                                                <div>Fecha de Inicio : <span
                                                        class="fw-medium">{{$project->start_date}}</span></div>
                                                <div class="vr"></div>
                                                <div>Fecha de Finalización : <span
                                                        class="fw-medium">{{$project->end_date}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                               href="#project-requirements"
                                               role="tab">
                                                Requerimientos
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content text-muted">
                <div class="tab-pane fade show active" id="project-requirements" role="tabpanel">
                    <div class="col-sm-auto">
                        <div>
                            <a href="{{route('account-project-requirement-create',$project)}}" class="btn btn-success">
                                <i class="ri-add-line align-bottom me-1"></i>
                                Agregar Nuevo
                            </a>
                        </div>
                    </div>
                    <p/>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-3">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="name" scope="col">Descripción</th>
                                            <th class="sort" data-sort="state" scope="col">Etapa</th>
                                            <th class="sort" data-sort="period" scope="col">Periodo</th>
                                            <th class="sort" data-sort="solution" scope="col">Solución</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($project->requirements()->get() as $item)
                                            <tr>
                                                <td class="name">{{$item->description}}</td>
                                                <td class="state">
                                                    @switch($item->state)
                                                        @case('PENDING')
                                                            Pendiente
                                                            @break
                                                        @case('CLOSE')
                                                            Cerrada
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td class="period w-25">{{$item->start_date}} / {{$item->end_date}}</td>
                                                <td class="solution">{{$item->solution}}</td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        @if($item->attachments()->count()>0)
                                                            <li class="list-inline-item edit"
                                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                data-bs-placement="top"
                                                                title="Descargar">
                                                                <a href="{{route('technical.project.requirement.download',$item)}}"
                                                                   class="text-muted d-inline-block">
                                                                    <i class="ri-download-fill align-bottom me-2 text-muted"></i>
                                                                </a>
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="project-files" role="tabpanel">
                    <div class="card">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
