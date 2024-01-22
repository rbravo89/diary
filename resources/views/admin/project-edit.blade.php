@extends('layouts.app')
@section('title')
    @lang('translation.edit-project')
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Administración
        @endslot
        @slot('title')
            Editar Proyecto
        @endslot
    @endcomponent
    <div class="row">
        <form method="POST" action="{{route('admin.project.update',$project)}}" class="needs-validation"
              novalidate>
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
                            <div class="row mb-3">
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
                        <a class="btn btn-danger w-sm"
                           href="{{ route('admin.project')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success w-sm">Grabar</button>
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

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Responsable</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mb-lg-0">
                                <label for="user_id" class="form-label">Técnico</label>
                                <select class="form-select" data-choices data-choices-search-false
                                        name="user_id"
                                        value="{{$project->user_id}}"
                                        id="user_id">
                                    <option value="{{null}}">--Seleccione--</option>
                                    @foreach($technicians as $item)
                                        <option value="{{$item->id}}"
                                                @if($item->id === $project->user_id) selected @endif>
                                            {{$item->name}} {{$item->surname}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <form method="POST" action="{{route('admin.project.addOrganization',$project)}}" class="needs-validation"
              novalidate>
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organizaciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row g-3">
                                <form method="POST" action="{{route('admin.project.addOrganization',$project)}}"
                                      novalidate
                                      class="neeed-validation">
                                    <div class="col-md-9">
                                        <select class="form-select"
                                                name="organization_id"
                                                required
                                                value="{{$project->user_id}}"
                                                id="organization_id">
                                            @error('organization_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <option value="{{null}}">--Seleccione--</option>
                                            @foreach($organizations as $org)
                                                <option value="{{$org->id}}">{{$org->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="ri-add-box-line me-1 align-bottom"></i>
                                                Agregar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Ruc</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->organizations as $org)
                                <tr>
                                    <td>{{$org->ruc}}</td>
                                    <td>{{$org->name}}</td>
                                    <td>
                                        @switch($org->pivot->type)
                                            @case('OWNER')
                                                Propietario
                                                @break
                                            @case('COLLABORATOR')
                                                Colaborador
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($org->pivot->type==='COLLABORATOR')
                                            <form method="POST"
                                                  action="{{route('admin.project.removeOrganization',[$project,$org->pivot->organization_id])}}">
                                                @csrf
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="Eliminar">

                                                    <button type="submit"
                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                class="ri-delete-bin-5-line"></i></button>

                                                </li>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </form>

    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
@endsection
