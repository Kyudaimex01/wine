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
                            Mi Articulo
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.articles.index') }}">Listado de Articulos</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a class="btn-link text-danger">
                                        <b>{{ $article->article_title }}</b>
                                    </a>
                                </h5>
                                <div class="card col-lg-4">
                                    <p style="margin-bottom: 0" class="text-success">Autor: </p><p>{{ $name }}</p>
                                </div>
                                <br>
                                <div class="card-body">
                                    {{ $article->article_content }}
                                </div>
                                <div class="card-body">
                                    {{ $article->article_bibliography }}
                                </div>
                                <div class="card-body">
                                    <h6>Palabras Clave:</h6>
                                    {{ $article->article_keywords }}
                                </div>
                            </div>
                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
