@extends('layouts.app')
@section('title')
    Usuarios
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            Administración
        @endslot
        @slot('title')
            Usuarios
        @endslot
    @endcomponent
    <div class="col-sm-auto">
        <div>
            <a href="{{route('admin.user.create')}}" class="btn btn-success">
                <i class="ri-add-line align-bottom me-1"></i>
                Agregar Nuevo
            </a>
        </div>
    </div>
    <p/>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="name" scope="col">Nombres</th>
                                    <th class="sort" data-sort="surname" scope="col">Apellidos</th>
                                    <th class="sort" data-sort="email" scope="col">Email</th>
                                    <th class="sort" data-sort="phone" scope="col">Teléfono</th>
                                    <th class="sort" data-sort="role" scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach($items as $item)
                                    <tr>
                                        <td class="name">{{$item->name}}</td>
                                        <td class="surname">{{$item->surname}}</td>
                                        <td class="email">{{$item->email}}</td>
                                        <td class="phone">{{$item->phone}}</td>
                                        <td class="role">
                                            @switch($item->role)
                                                @case('ACCOUNT_MANAGER')
                                                    Administrador de Cuenta
                                                    @break
                                                @case('ADMINISTRATOR')
                                                    Administrador
                                                    @break
                                                @case('TECHNICAL')
                                                    Técnico
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Editar">
                                                    <a href="{{route('admin.user.edit',$item)}}"
                                                       class="text-muted d-inline-block">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
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
