@extends('admin.layouts.default')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" href="/assets/css/wickedcss.min.css"/>
@endsection

@section('content')
<style>    
    .thum {
        width: 100%;
        height: 100px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        Dashboard
                    </div>
                    @can('create bulletins')
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{ route('admin.bulletins.create') }}">Subir Boletin</a>
                    </div>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="row">
                        @can('list bulletins')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.bulletins.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/bulletin-2.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Boletines
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list templates')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.templates.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/bulletin-3.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Plantillas
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list letters')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.letters.index") }}'>
                            <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded shake">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/letters.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Cartas
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list articles')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.articles.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded shake">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/article.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Articulos
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list users')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.users.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/grupo.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Usuarios
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list roles')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.roles.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/settings.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Roles
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list redactors')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.redactors.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/work.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Redactores
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('list areas')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.areas.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/world.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Areas
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        @can('train machine')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href='{{ route("admin.train.machine.index") }}'>
                                <div class="card text-center mb-3 shadow-lg p-3 mb-5 bg-white rounded bounceIn">
                                    <img class="card-img-top thum bg-light " src="/assets/images/svg/aprendizaje-automatico.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                Entrenar clasificador de cartas
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        
    </script>    
@endsection