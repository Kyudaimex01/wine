
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" name="firstname" value="{{ isset($redactor) ? $redactor->firstname : old('firstname') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('firstname')? 'd-block' : '' }}">
                {{ $errors->has('firstname')? $errors->first('firstname') : 'El campo de Nombre es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label>Apellido</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">L</span>
            </div>
            <input type="text" class="form-control" placeholder="Apellido" name="lastname" value="{{ isset($redactor) ? $redactor->lastname : old('lastname') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('lastname')? 'd-block' : '' }}">
                {{ $errors->has('lastname')? $errors->first('lastname') : 'El campo de Apellido es requerido'  }}
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Nombre de usuario</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" value="{{ isset($redactor) ? $redactor->username : old('username') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('username')? 'd-block' : '' }}">
                {{ $errors->has('username')? $errors->first('username') : 'El campo de Nombre de usuario es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label>Fecha de nacimiento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">D</span>
            </div>
            <input type="date" class="form-control" id="datepicker" name="birthdate" value="{{ isset($redactor) ? $redactor->birthdate : old('birthdate') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('birthdate')? 'd-block' : '' }}">
                {{ $errors->has('birthdate')? $errors->first('birthdate') : 'El campo de Fecha de nacimiento es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label>Area</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">A</span>
            </div>

            <select class="js-example-basic-multiple form-control" name="area_id" multiple>
                @foreach ($areas as $item)
                    <option value="{{ $item->id }}" {{ (isset($redactor) && isset($redactor->area) && $redactor->area->name == $item->name) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('username')? 'd-block' : '' }}">
                {{ $errors->has('username')? $errors->first('username') : 'El campo de Nombre de usuario es requerido'  }}
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>E-mail</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ isset($redactor) ? $redactor->email : old('email') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('redactor')? 'd-block' : '' }}">
                {{ $errors->has('email')? $errors->first('email') : 'El campo de E-mail es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label>C.I.</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">CI</span>
            </div>
            <input type="text" class="form-control" placeholder="C.I." name="ci" value="{{ isset($redactor) ? $redactor->ci : old('ci') }}" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('ci')? 'd-block' : '' }}">
                {{ $errors->has('ci')? $errors->first('ci') : 'Este campo de C.I. es requerido.'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label>Telefono/Celular</label>
                              
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">P</span>
            </div>
            <input type="text" class="form-control" placeholder="Telefono" name="phone" value="{{ isset($redactor) ? $redactor->phone : old('phone') }}" required>
            <div class="valid-feedback">
                    Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('phone')? 'd-block' : '' }}">
                {{ $errors->has('phone')? $errors->first('phone') : 'Este campo de Telefono o Celular es requerido.'  }}
            </div>
        </div>
    </div>
   
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label>Password</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('password')? 'd-block' : '' }}">
                {{ $errors->has('password')? $errors->first('password') : 'Este campo es importante no debe estar vacio.'  }}
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label>Confirm Password</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirm" required>
            <div class="valid-feedback">
                Se ve bien!
            </div>
            <div class="invalid-feedback {{ $errors->has('password_confirm')? 'd-block' : '' }}">
                {{ $errors->has('password_confirm')? $errors->first('password_confirm') : 'Este campo es importante no debe estar vacio.'  }}
            </div>
        </div>
    </div>
</div>
