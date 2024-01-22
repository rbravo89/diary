@extends('layouts.app')
@section('title')
    Organizaciones
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Administración
        @endslot
        @slot('title')
            Organizaciones
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xxl-12">
            <div id="organizationList" class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table id="customerTable" class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="name" scope="col">Ruc</th>
                                    <th class="sort" data-sort="company_name" scope="col">Organización</th>
                                    <th class="sort" data-sort="name" scope="col">Responsable</th>
                                    <th class="sort" data-sort="email" scope="col">Email</th>
                                    <th class="sort" data-sort="phone" scope="col">Teléfono</th>
                                    <th class="sort" data-sort="phone" scope="col">Etapa</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach($items as $item)
                                    <tr>
                                        <td class="ruc">{{$item->ruc}}</td>
                                        <td class="name">{{$item->name}}</td>
                                        <td class="fullname">{{$item->users[0]->name}} {{$item->users[0]->surname}}</td>
                                        <td class="email">{{$item->users[0]->email}}</td>
                                        <td class="phone">{{$item->users[0]->phone}}</td>
                                        <td class="state">
                                            @switch($item->state)
                                                @case('PENDING')
                                                    Pendiente
                                                    @break
                                                @case('CANCELLED')
                                                    Cancelada
                                                    @break
                                                @case('REJECTED')
                                                    Rechazada
                                                    @break
                                                @case('ACCEPTED')
                                                    Aceptada
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                @if($item->state ==='PENDING')
                                                    <form method="POST"
                                                          action="{{route('admin.organization.accepted', $item)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Aceptar">
                                                            <button type="submit"
                                                                    class="btn btn-success btn-icon waves-effect waves-light">
                                                                <i class="ri-checkbox-circle-fill fs-16"></i>
                                                            </button>
                                                        </li>
                                                    </form>
                                                @endif
                                                @if($item->state ==='PENDING')
                                                    <form method="POST"
                                                          action="{{route('admin.organization.rejected', $item)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Rechazar">
                                                            <button type="submit"
                                                                    class="btn btn-warning btn-icon waves-effect waves-light">
                                                                <i class="ri-close-circle-line fs-16"></i>
                                                            </button>
                                                        </li>
                                                    </form>
                                                @endif
                                                @if($item->state ==='ACCEPTED')
                                                    <form method="POST"
                                                          action="{{route('admin.organization.cancelled', $item)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Cancelar">
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-icon waves-effect waves-light">
                                                                <i class="ri-close-circle-line fs-16"></i>
                                                            </button>
                                                        </li>
                                                    </form>
                                                @endif
                                                @if($item->state==='CANCELLED')
                                                    <form method="POST"
                                                          action="{{route('admin.organization.accepted', $item)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Activar">
                                                            <button type="submit"
                                                                    class="btn btn-success btn-icon waves-effect waves-light">
                                                                <i class="ri-checkbox-circle-fill fs-16"></i>
                                                            </button>
                                                        </li>
                                                    </form>
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
    </div>
@endsection

