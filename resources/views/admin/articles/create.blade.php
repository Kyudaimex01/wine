@extends('admin.layouts.default')

@section('title',"create")

@section('content')

    <div class="title">
        <h1 class="c-grey-900 mB-20 d-inline">Redactar Articulo</h1>
        <a href="#" class="btn btn-outline-primary rounded-pill float-right" data-toggle="modal" data-target="#exampleModalCenter">Mostrar carta</a>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form class="form-validation" method="post" action="{{ route('admin.articles.store')}}" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                
                @include('admin.articles.form')

                <div class="text-center">
                    <button class="btn btn-outline-success" type="submit">Enviar Articulo</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-danger">Cancelar</a>                    
                </div>
            </form>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card border-primary mb-3 mt-2">
                    <div class="card-header bg-transparent border-success">
                        <div class="date text-right">
                          
                        <b id="date">{{ $letter->created_at }}</b>
                            <br>
                            <b>Cochabamba, Bolivia</b> 
                        </div>
                        <div class="letter-information">
                        <b>Direccion : </b><b id="address">Avenida Heroinas</b>
                        </div>
                        <div class="card-body">
                            <div>
                                <b>Estimado Sr.</b>
                                <div class="container">
                                    <b id="greeting">{{ $letter->letter_greeting }}</b>
                                </div>
                            </div>
                            <div id="content_letter">
                                {{ $letter->letter_content }}
                            </div>
                            imagenes
                        </div>
                        <div class="card-footer bg-transparent border-success">
                        <b id="farewell">{{ $letter->letter_farewell }}</b>
                            <div class="text-center mt-2">
                            <b class="d-block" id="name_letter">{{ $letter->user->firstname . " " . $letter->user->lastname}}</b>
                                <b class="d-block" id="email">{{ $letter->user->email }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('form-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    </script>
@endsection