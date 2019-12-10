@extends('auth.layouts.default')

@section('title')
    Register
@endsection

@section('content')
<h4 class="fw-300 c-grey-900 mB-40">Registro</h4>

<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label for="firstname" class="text-normal text-dark">Ingresa tu nickname (alias)</label>

        <input id="name" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

        @if ($errors->has('firstname'))
            <span class="help-block">
                <strong>{{ $errors->first('firstname') }}</strong>
            </span>
        @endif
    </div>
<!--
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="text-normal text-dark">Ingresa tu nickname seguido de @email.com (ej: nickname@email.com)</label>

        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
-->
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="text-normal text-dark">Ingresa tu Contraseña</label>

        <input id="password" type="text" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm" class="text-normal text-dark">Confirma tu Contraseña</label>

        <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">
            Enviar
        </button>
    </div>
</form>
<div class="peer">
    <a href="/" class="btn btn-primary ">Cancelar</a>    
</div>
@endsection
