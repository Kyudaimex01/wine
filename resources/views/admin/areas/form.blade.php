
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ isset($area) ? $area->name : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            
            <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
                {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label>Descripcion</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">L</span>
            </div>
        <textarea type="text" class="form-control" placeholder="Descripcion" name="description" required>{{ isset($area) ? $area->description : '' }}</textarea>
            <div class="valid-feedback">
                Campo llenado correctamente
            </div>
            <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
                {{ $errors->has('description')? $errors->first('description') : 'El campo de Descripcion es requerido'  }}
            </div>
        </div>
    </div>
</div>
