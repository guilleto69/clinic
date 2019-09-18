@extends('theme.backoffice.layouts.admin')

@section('title', 'Permisos del Sistema')

@section('head')

@endsection

@section('breadcumbs')

    <li><a href="{{ route('backoffice.permission.index')}}" >Permisos del Sistema</a></li>
@endsection


@section('dropdown_settings')
    <li><a href="{{ route('backoffice.permission.create')}}" class="grey-text text-darken-2">Crear Permiso</a></li>
@endsection

@section('content')
    
    <div class="section">
    <p class="caption"><strong>Permisos del Sistema</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12">
                    <div class="card">                    
                        <div class="card-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Descripcion</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                        <td><a href="{{ route('backoffice.permission.show', $permission) }}">{{$permission->name}}</a></td>
                                            <td>{{$permission->slug}}</td>
                                            <td>{{$permission->description}}</td>
                                            <td><a href="{{route('backoffice.role.show', $permission->role) }}">{{$permission->role->name}}</a></td>
                                            <td><a href="{{route('backoffice.permission.edit', $permission) }}">Editar</a></td>
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

@section('foot')

@endsection