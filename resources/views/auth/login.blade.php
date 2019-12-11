@extends('auth.layouts.default')

@section('title')
    Login
@endsection

@section('content')
<h4 class="fw-300 c-grey-900 mB-40">Iniciar Sesion</h4>

<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="text-normal text-dark">Correo Electronico</label>
        <input type="email" class="form-control" name="email" placeholder="nickname@email.com" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <div class="invalid-feedback {{ $errors->has('email')? 'd-block' : '' }}">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif

    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="text-normal text-dark">Contraseña</label>
        <input type="text" class="form-control" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <div class="invalid-feedback {{ $errors->has('password')? 'd-block' : '' }}">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                    <input type="checkbox" id="inputCall1" name="remember" {{ old('remember') ? 'checked' : '' }} class="peer">
                    <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                        <span class="peer peer-greed"> Recuerdame</span>
                    </label>
                </div>
            </div>
            <div class="peer">
                <button class="btn btn-primary ">Iniciar Sesion</button>    
            </div>

        </div>
    </div>
    <!--
    <a class="btn btn-link" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
-->
</form>

            <div class="peer">
                <a href="/" class="btn btn-primary ">Cancelar</a>    
            </div>
@endsection