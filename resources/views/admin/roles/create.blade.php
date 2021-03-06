@extends('admin.layouts.default')

@section('title', 'Create')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="title">
        <h1>Crear role</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form class="form-validation" method="POST" action="{{ route('admin.roles.store') }}" novalidate>
                {{ csrf_field() }}
                @include('admin.roles.form')

                <div class="text-center mb-4">
                    <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </form>
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