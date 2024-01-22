@extends('layouts.app')
@section('title')
    @lang('translation.create-project')
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Cuenta
        @endslot
        @slot('title')
            Crear Proyecto
        @endslot
    @endcomponent
    <form method="POST" action="{{route('account.projects.update', $project)}}" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"
                                   for="name">Nombre del proyecto</label>
                            <input id="name"
                                   type="text"
                                   name="name"
                                   class="form-control  @error('name') is-invalid @enderror"
                                   required
                                   placeholder="Ingrese el nombre del proyecto"
                                   value="{{$project->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="objective">Objetivo</label>
                            <input id="objective"
                                   name="objective"
                                   required
                                   value="{{$project->objective}}"
                                   class="form-control">
                            @error('objective')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="location">Ubicación</label>
                            <input id="location"
                                   name="location"
                                   required
                                   value="{{$project->location}}"
                                   class="form-control">
                            @error('location')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="state" class="form-label">Estado</label>
                                    <select class="form-select"
                                            name="state"
                                            value="{{$project->state}}"
                                            id="state">
                                        <option value="PLANNING"
                                                @if($project->state ==='PLANNING') selected @endif>
                                            Planificación
                                        </option>
                                        <option value="EXECUTION"
                                                @if($project->state ==='EXECUTION') selected @endif>Ejecución
                                        </option>
                                        <option value="ASSESSMENT"
                                                @if($project->state ==='ASSESSMENT') selected @endif>Evaluación
                                        </option>
                                        <option value="CLOSE"
                                                @if($project->state ==='CLOSE') selected @endif>Cierre
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="start_date"
                                           class="form-label">Fecha de Inicio</label>
                                    <input id="start_date"
                                           type="date"
                                           required
                                           class="form-control @error('start_date') is-invalid @enderror"
                                           name="start_date"
                                           placeholder="Ingrese una fecha"
                                           data-provider="flatpickr"
                                           value="{{$project->start_date}}">
                                    @error('start_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="end_date"
                                           class="form-label">Fecha de Finalización</label>
                                    <input id="end_date"
                                           type="date"
                                           required
                                           class="form-control @error('end_date') is-invalid @enderror"
                                           name="end_date"
                                           value="{{$project->end_date}}"
                                           placeholder="Ingrese una fecha" data-provider="flatpickr">
                                    @error('end_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-4">
                    <a class="btn btn-danger w-sm" href="{{ route('account.projects', auth()->user()) }}">Cancelar</a>
                    <button type="submit" class="btn btn-success w-sm">Actualizar</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Información</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"
                                   for="public">Público objetivo</label>
                            <input id="public"
                                   type="text"
                                   required
                                   value="{{$project->public}}"
                                   name="public"
                                   class="form-control @error('public') is-invalid @enderror">
                            @error('public')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="beneficiaries"># Beneficiarios</label>
                            <input id="beneficiaries"
                                   type="number"
                                   required
                                   value="{{$project->beneficiaries}}"
                                   name="beneficiaries"
                                   class="form-control @error('beneficiaries') is-invalid @enderror">
                            @error('beneficiaries')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if($project->user!==null)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Responsble</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label"
                                       for="technical-name">Nombres y Apellidos</label>
                                <input id="technical-name"
                                       type="text"
                                       disabled
                                       value="{{$project->user->name}} {{$project->user->surname}}"
                                       name="technical-name"
                                       class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="technical-email">Email</label>
                                <input id="technical-email"
                                       type="text"
                                       disabled
                                       value="{{$project->user->email}}"
                                       name="technical-email"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
@endsection
