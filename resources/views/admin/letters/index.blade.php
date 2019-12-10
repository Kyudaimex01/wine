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
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('redactor'))
                                Lista de cartas
                            @else
                                Mis cartas
                            @endif
                        </div>

                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.letters.create') }}">Redactar carta</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <style>
                                .card_image {
                                    border-radius: 4%;
                                    border: 2px dashed hsla(44, 100%, 25%, 0.52)
                                }
                            </style>
                        @forelse($letters as $letter)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card text-center card_image mb-3">
                                    @if ($letter->area->name == 'Deportes')
                                        <img class="card-img-top thum" src='/assets/letter/football.svg' alt="Card image cap">
                                    @elseif ($letter->area->name == 'Tecnologia')
                                        <img class="card-img-top thum" src='/assets/letter/tecnologia.svg' alt="Card image cap">
                                    @elseif ($letter->area->name == 'Economia')
                                        <img class="card-img-top thum" src='/assets/letter/money.svg' alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            @if ($letter->readed == true)
                                                <span class="badge badge-success">Leido</span>
                                            @else
                                                <span class="badge badge-danger">Nuevo</span>
                                            @endif
                                        </h5>

                                        <p class="card-text">
                                            @if ($letter->readed == true)
                                                <img class="letterhere" src="/assets/img/carta.svg" alt="Letter">
                                            @else
                                                <img class="letterhere" src="/assets/img/closed.svg" alt="Letter">
                                            @endif
                                            <div class="contenedor-modal">
                                                <a href="#" onclick="show_letter(event, {{ $letter->id }});">Ver carta</a>
                                            </div>
                                        </p>
                                    </div>
                                    @can('create articles')
                                        <a class="btn btn-outline-primary btn-block" href='{{ route("admin.articles.create", $letter->id ) }}'>Redactar articulo</a>
                                    @endcan
                                 </div>
                            </div>
                        @empty
                            <p>No hay carta</p>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .modal-dialog-centered {
            background: hsla(44, 100%, 25%, 0.52);
            border: 2px dashed black;
            border-radius: 4%;
        }

        .modal-header, .modal-content, .modal-footer, .modal-body {
            background: hsla(44, 100%, 82%, 0.52);
            border: 0;
        }


    </style>

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
                            <b id="date"></b>
                            <br>
                            <b>Cochabamba, Bolivia</b> 
                        </div>
                        <div class="letter-information">
                            <b>Direccion : </b><b id="address"></b>
                        </div>
                        <div class="card-body">
                            <div>
                                <b>Estimado Sr.</b>
                                <div class="container">
                                    <b id="greeting">Saludos</b>
                                </div>
                            </div>
                            <div id="content_letter">
                                
                            </div>
                            imagenes
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            
                            <div class="text-center mt-2">
                                <b class="d-block" id="name_letter">nombre</b>
                                <b class="d-block" id="email">correo</b>
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
        const alertMessage = () => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'No hay areas registradas',
                text: "Quiere registrar algun area ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.replace('{{ route("admin.areas.index") }}');
                } else if ( result.dismiss === Swal.DismissReason.cancel) {
                    window.location.replace('{{ route("admin.dashboard") }}');
                }
            })
        }

        if ('{{ $areas == 0 }}') {
            alertMessage()
        }

        const show_letter = (event, id) => {
            event.preventDefault()
            var url = '{{ route("admin.letters.show", ":id") }}'
            url = url.replace(':id', id);

            $.ajax({
                method: "GET",
                url: url,
            })
            .done(function( letter ) {
                if (letter) {
                    $('#date').html(letter.created_at)
                    $('#greeting').html(letter.letter_greeting)
                    $('#content_letter').html(letter.letter_content)
                    $('#farewell').html(letter.letter_farewell)
                    $('#name_letter').html(letter.letter_farewell)
                    $('#name_email').html(letter.letter_farewell)
                    $('#exampleModalCenter').modal('show');
                }
            });
        }
    </script>
@endsection