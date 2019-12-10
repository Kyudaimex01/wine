

<div class="form-row">
    <div class="col-md-12 mb-3">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ isset($role) ? $role->name : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
                {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label>Permisos</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">P</span>
            </div>
            <select 
                class="js-example-basic-multiple form-control" 
                name="permissions[]" 
                multiple="multiple">
                @foreach ($permissions as $item)
                    <option value="{{ $item->name }}" {{ (isset($role) && $role->permissions->contains('name', $item->name)) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
                {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
            </div>
        </div>
    </div>
</div>