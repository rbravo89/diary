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
    <form method="POST" action="{{route('account.projects.create')}}" class="needs-validation" novalidate>
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
                                   value="{{old('name')}}">
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
                                   value="{{old('objective')}}"
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
                                   value="{{old('location')}}"
                                   class="form-control">
                            @error('location')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="state" class="form-label">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="state"
                                            disabled
                                            data-value="{{old('state')}}"
                                            id="state">
                                        <option value="PLANNING" selected>Planificación</option>
                                        <option value="EXECUTION">Ejecución</option>
                                        <option value="ASSESSMENT">Evaluación</option>
                                        <option value="CLOSE">Cierre</option>
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
                                           value="{{old('start_date')}}">
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
                                           value="{{old('end_date')}}"
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
                    <button type="submit" class="btn btn-success w-sm">Crear</button>
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
                                   value="{{old('public')}}"
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
                                   value="{{old('beneficiaries')}}"
                                   name="beneficiaries"
                                   class="form-control @error('beneficiaries') is-invalid @enderror">
                            @error('beneficiaries')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
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
