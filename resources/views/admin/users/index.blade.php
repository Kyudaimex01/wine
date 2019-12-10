@extends('admin.layouts.default')

@section('title', 'List')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20">
                <h4 class="c-grey-900 mB-20 d-inline">Lista de usuarios</h4>
                <a href="{{ route('admin.users.create')}}" class="btn btn-outline-primary rounded-pill float-right">Crear Nuevo</a>
                <div class="table-responsive-xl">
                    <table class="table table-sm table-hover mt-2">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">C.I.</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->ci }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id ) }}" class="btn btn-outline-success rounded-pill">Editar</a>
                                            <form method="POST" style="display:inline-block" action="{{ route('admin.users.destroy', $user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <button type="button" onclick="delete_action(event);" class="btn btn-outline-danger rounded-pill">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($users->count() > 10)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
