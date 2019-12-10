@extends('admin.layouts.default')

@section('title', 'List')

@section('content')
    <style>
        .thum {
            width: 100%;
            height: 100px;
        }
        .letterhere {
            width: 25px;
            height: 25px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            Mis Plantillas
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.templates.create') }}">Subir Plantilla</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($templates as $template)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-center mb-3">
                                        <img class="card-img-top thum"
                                                src="{{ asset('storage/'.$template->path_cover) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="btn-link text-danger" >
                                                    {{ $template->name }}
                                                </a>
                                            </h5>
                                            
                                            <a href="{{ route('admin.templates.edit', $template->id ) }}" class="btn btn-outline-success btn-block">Editar</a>
                                            <a href="{{ route('admin.templates.download', $template->id ) }}" class="btn btn-outline-success btn-block" >Descargar</a>
                                        </div>
                                            <form method="POST" style="display:inline-block" action="{{ route('admin.templates.destroy', $template->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <button type="submit" class="btn btn-outline-danger btn-block">Eliminar</button>
                                            </form>
                                        </div>
                                </div>
                            @empty
                                <p>No hay Plantillas</p>
                            @endforelse    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
