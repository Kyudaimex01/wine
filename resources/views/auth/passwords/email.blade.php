@extends('auth.layouts.default')

@section('content')
<h4 class="fw-300 c-grey-900 mB-40">Login</h4>

<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="text-normal text-dark">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <div class="invalid-feedback {{ $errors->has('email')? 'd-block' : '' }}">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
    </div>

    <div class="form-group">
        <div class="peer">
            <button type="submit" class="btn btn-outline-primary">
                Send Password Reset Link
            </button>
        </div>
    </div>
</form>

@endsection
