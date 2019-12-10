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
                            Mi Boletin
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.bulletins.index') }}">Listado de Boletines</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a class="btn-link text-danger">
                                        <b>{{ $bulletin->bulletin_title }}</b>
                                    </a>
                                </h5>
                                <div class="card col-lg-4">
                                    <img class="card-img-top thum" src="{{ asset('storage/'.$bulletin->path_cover) }}" alt="Portada"></img>
                                    <p style="margin-bottom: 0" class="text-success">Autor: </p><p>{{ $name }}</p>
                                </div>
                                <br>
                                <div>
                                    <div class="embed-container native-embed-container">
                                        <embed src="{{ route('admin.bulletins.view', $bulletin->id ) }}" style="width: 100%; height: 650px" frameborder="1" />
                                    </div>
                                </div>
                            </div>
                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
