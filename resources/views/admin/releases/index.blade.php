@extends('admin.layouts.default')

@section('title', 'List')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            Mis Boletines
                        </div>

                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.releases.create') }}">Subir Boletin</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card text-center mb-3">
                                    <img class="card-img-top thum bg-light " src="/images/svg/book.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                <a class="btn-link" href="#">
                                                    Mis Boletines
                                                </a>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card text-center mb-3">
                                    <img class="card-img-top thum bg-light " src="/images/svg/link.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>
                                                <a class="btn-link" href="#">
                                                    Plantillas
                                                </a>
                                            </strong>
                                        </p>
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
