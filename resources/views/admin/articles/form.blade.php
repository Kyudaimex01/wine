<div class="form-row"> 
    
    <div class="col-md-12 mb-3">
        <label name="article_title">Titulo del articulo</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">T</span>
            </div>
            <input type="text" name="article_title" class="form-control" placeholder="Escribe el titulo" value="{{ isset($article) ? $article->article_title : old('article_title') }}" required>

            <div class="valid-feedback">
                Campo correctamente llenado
            </div>
            
            <div class="invalid-feedback {{ $errors->has('article_title')? 'd-block' : '' }}">
                {{ $errors->has('article_title')? $errors->first('article_title') : 'El Titulo del Articulo es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label name="article_author">Autor</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">A</span>
            </div>
            <input type="text" name="article_author" class="form-control" value="{{ Auth::user()->firstname. ' ' . Auth::user()->lastname }}" required disabled>

            <div class="valid-feedback">
                Campo llenado correctamente
            </div>
                
            <div class="invalid-feedback {{ $errors->has('article_author')? 'd-block' : '' }}">
                {{ $errors->has('article_author')? $errors->first('article_author') : 'El campo de autor es requerido'  }}
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <label>Contenido</label>
        
        <textarea name="article_content" id="article_content"class="form-control">{!! isset($article) ? $article->article_content : old('article_content') !!}</textarea>
        
        <div class="invalid-feedback {{ $errors->has('article_content')? 'd-block' : '' }}">
            {{ $errors->has('article_content')? $errors->first('article_content') : 'No se puede guardar un articulo si no existe contenido en el mismo'  }}
        </div>
            
    </div>

</div>

@section('scripts')
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'article_content', {
        language: 'es',
        uiColor: '#9AB8F3',
        filebrowserUploadUrl:"upload.php",
        image2_alignClasses: [ 'image-left', 'image-center', 'image-right' ],
        image2_captionedClass: 'image-captioned'
    });
</script>
@endsection