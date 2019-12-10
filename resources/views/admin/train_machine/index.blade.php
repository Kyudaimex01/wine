@extends('admin.layouts.default')

@section('title', 'List')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        Entrenar
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm mt-2">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($areas as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="#" onclick="train('{{$item->slug}}')" class="btn btn-outline-primary rounded-pill">Entrenar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>
        const train = (name) => {
            Swal.fire({
                title: 'Texto de entrenamiento',
                html: `<h2 style='font-family: cursive'><strong>${name}</strong></2>.`,
                input: 'textarea',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Entrenar',
                showLoaderOnConfirm: true,
                preConfirm: (text) => {
                    return fetch(`http://classify-child.herokuapp.com/api/v1/train`, {
                        method: 'POST',
                        body: new URLSearchParams({name: name, description: text}),
                        headers: new Headers({
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        }),
                    }).then(response => {
                        if ($response.statusText != "OK") {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    }).catch(error => {
                        console.log(error)
                        if (error.message == 'Bad Request') {
                            Swal.showValidationMessage(
                                `El campo de texto no puede estar vacio.`
                            )
                        } else {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: `I learned news words tranks`,
                        imageUrl: 'https://fotos01.diarioinformacion.com/mmp/2018/11/18/690x278/inteligenciartificial.jpg'
                    })
                }
            })
        }
    </script>
@endsection