@extends('layouts.app')
@section('title')
    @lang('translation.overview')
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Proyecto
        @endslot
        @slot('title')
            Crear Requerimiento
        @endslot
    @endcomponent
    <div class="row mt-2">
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
                                            <span>Nombre de proyecto</span>
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
                                                <div>Responsable :
                                                    <span
                                                        class="fw-medium">{{$project->user->name}} {{$project->user->surname}} </span>
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
        </div>
    </div>
    <form method="POST" action="{{route('account-project-requirement-create.store',$project)}}"
          class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Fecha Inicio</label>
                                    <input id="start_date"
                                           type="date"
                                           required
                                           class="form-control @error('start_date') is-invalid @enderror"
                                           name="start_date"
                                           placeholder="Ingrese una fecha"
                                           data-provider="flatpickr"
                                           value="{{old('start_date')}}">
                                    @error('start_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Fecha limite</label>
                                    <input id="end_date"
                                           type="date"
                                           required
                                           class="form-control @error('end_date') is-invalid @enderror"
                                           name="end_date"
                                           value="{{old('end_date')}}"
                                           placeholder="Ingrese una fecha" data-provider="flatpickr">
                                    @error('end_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="state" class="form-label">Etapa</label>
                                    <input id="state" class="form-control" disabled value="Pendiente"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea id="description"
                                              rows="5"
                                              name="description"
                                              class="form-control"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hstack gap-2 justify-content-end">
                    <a class="btn btn-danger"
                       href="{{route('account-project-requirement',$project)}}">Cancelar</a>
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
@endsection
