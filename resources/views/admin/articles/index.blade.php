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
    <nav class="navbar navbar-light bg-light pull-righ">
             <form class=" form-inline ml-auto" role="search"  method="GET" action="
                {{route('admin.articles.index')}}">
                 <div class="active-cyan-3 active-cyan-4 mb-0">
                    <input class="form-control  mr-sm-2" type="text" name="nombre" placeholder="Buscar articulos" aria-label="Search">
                </div>
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Buscar</button>
             </form>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            Mis Articulos
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($articles as $article)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-center mb-3">
                                        <img class="card-img-top thum"
                                                src="/assets/img/documentos.svg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="btn-link text-danger"
                                                    >
                                                    {{ $article->article_title }}
                                                </a>
                                            </h5>
                                            
                                            <a href="{{ route('admin.articles.edit', $article->id ) }}" class="btn btn-outline-success btn-block">Editar</a>
                                        </div>
                                            <form method="POST" style="display:inline-block" action="{{ route('admin.articles.destroy', $article->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <button type="button" onclick="delete_action(event);" class="btn btn-outline-danger btn-block">Eliminar</button>
                                            </form>
                                        </div>
                                </div>
                            @empty
                                <p>No hay articulos</p>
                            @endforelse    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
