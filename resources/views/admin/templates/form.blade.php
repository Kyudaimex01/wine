<div class="col-md-12 mb-3">
    <label name="bulletin_title">Nombre de la Plantilla</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">T</span>
        </div>
        <input type="text" name="name" class="form-control" placeholder="Escribe el nombre" value="{{ isset($template) ? $template->name : old('name') }}" required>

        <div class="valid-feedback">
            Campo correctamente llenado
        </div>
            
        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El Nomre de la Plantilla es requerido'  }}
        </div>
    </div>
</div>

<div class="col-md-12 mb-3">
    <label name="template_cover">Ingrese una imagen con la vista previa de la Plantilla</label>
    <div class="image input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">V</span>
        </div>
        <input type="file" class="form-control" name="template_cover" required>
    </div>
</div>

<div class="col-md-12 mb-3">
    <label name="template_file">Ingrese el archivo con la Plantilla</label>
    <div class="image input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">P</span>
        </div>
        <input type="file" class="form-control" name="template_file" required>
    </div>
</div>
