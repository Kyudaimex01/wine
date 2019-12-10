<div class="col-md-12 mb-3">
    <label name="bulletin_title">Titulo del Boletin</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">T</span>
        </div>
        <input type="text" name="bulletin_title" class="form-control" placeholder="Escribe el titulo" value="{{ isset($bulletin) ? $bulletin->bulletin_title : old('bulletin_title') }}" required>

        <div class="valid-feedback">
            Campo correctamente llenado
        </div>
            
        <div class="invalid-feedback {{ $errors->has('bulletin_title')? 'd-block' : '' }}">
            {{ $errors->has('bulletin_title')? $errors->first('bulletin_title') : 'El Titulo del Boletin es requerido'  }}
        </div>
    </div>
</div>

<div class="col-md-12 mb-3">
    <label name="bulletin_vol">Volumen del Boletin</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">V</span>
        </div>
        <input type="text" name="bulletin_vol" class="form-control" placeholder="Escribe el volumen" value="{{ isset($bulletin) ? $bulletin->bulletin_vol : old('bulletin_vol') }}" required>

        <div class="valid-feedback">
            Campo correctamente llenado
        </div>
            
        <div class="invalid-feedback {{ $errors->has('bulletin_vol')? 'd-block' : '' }}">
            {{ $errors->has('bulletin_vol')? $errors->first('bulletin_vol') : 'El Volumen del Boletin es requerido'  }}
        </div>
    </div>
</div>
<div class="col-md-12 mb-3">
    <label name="bulletin_cover">Ingrese la imagen de portada del Boletin</label>
    <div class="image input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">P</span>
        </div>
        <input type="file" class="form-control" name="bulletin_cover" required>
    </div>
</div>

<div class="col-md-12 mb-3">
    <label name="bulletin_pdf">Ingrese el archivo con el Boletin (en formato pdf)</label>
    <div class="image input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">F</span>
        </div>
        <input type="file" class="form-control" name="bulletin_pdf" required>
    </div>
</div>

<div class="col-md-12 mb-3">
    <label name="bulletin_file">Ingrese el archivo original del Boletin (en formato .pub)</label>
    <div class="image input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">B</span>
        </div>
        <input type="file" class="form-control" name="bulletin_file" required>
    </div>
</div>
