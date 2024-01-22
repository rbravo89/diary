@extends('layouts.app')
@section('title')
    Proyectos
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Responsable
        @endslot
        @slot('title')
            Proyectos
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xxl-12">
            <div id="organizationList" class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="name" scope="col">Nombre</th>
                                    <th class="sort" data-sort="objective" scope="col">Objectivo</th>
                                    <th class="sort" data-sort="beneficiaries" scope="col">Beneficiarios</th>
                                    <th class="sort" data-sort="location" scope="col">Ubicación</th>
                                    <th class="sort" data-sort="state" scope="col">Etapa</th>
                                    <th class="sort" data-sort="state" scope="col">Requerimientos</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach($items as $item)
                                    <tr>
                                        <td class="name">{{$item->name}}</td>
                                        <td class="objective">{{$item->objective}}</td>
                                        <td class="beneficiaries">{{$item->beneficiaries}}</td>
                                        <td class="location">{{$item->location}}</td>
                                        <td class="state">
                                            {{$item->requirements()->get()->count()}}
                                            @switch($item->state)
                                                @case('PLANING')
                                                    Planificación
                                                    @break
                                                @case('EXECUTION')
                                                    Ejecución
                                                    @break
                                                @case('ASSESSMENT')
                                                    Evaluación
                                                    @break
                                                @case('CLOSING')
                                                    Cierre
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if($item->requirements()->get()->where('state','PENDING')->count()>1)
                                                <li class="list-inline-item edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top"
                                                    title="Requerimientos Pendientes">
                                                    <a href="{{route('technical.project.requirement',$item)}}">
                                                    <span
                                                        class="badge bg-danger text-uppercase">
                                                        {{$item->requirements()->get()->where('state','PENDING')->count()}}
                                                    </span>
                                                    </a>
                                                </li>
                                            @else
                                                <span class="badge bg-primary text-uppercase">0</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top"
                                                    title="Ver Requerimientos ">
                                                    <a href="{{route('technical.project.requirement',$item)}}"
                                                       class="text-muted d-inline-block">
                                                        <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                    </a>
                                                </li>
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
    </div>
@endsection
