@extends('admin.layouts.default')

@section('title', 'List')

@section('content')
    <style>
        .thum {
            width: 100%;
            height: 100px;
        }
        .letterhere {
            width: 25px;
            height: 25px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            Mis Boletines
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-success" href="{{ route('admin.bulletins.create') }}">Subir Boletin</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @forelse($bulletins as $bulletin)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card text-center mb-3">
                                        <img class="card-img-top thum" 
                                                src="{{ asset('storage/'.$bulletin->path_cover) }}" alt="Card image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="btn-link text-danger"
                                                    >
                                                    {{ $bulletin->bulletin_title }}
                                                </a>
                                            </h5>
                                            <a href="{{ route('admin.bulletins.show', $bulletin->id ) }}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.bulletins.edit', $bulletin->id ) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.bulletins.download', $bulletin->id ) }}" class="btn btn-outline-success" ><i class="fa fa-download"></i></a>
                                        </div>
                                        @if(($bulletin->published)=="false")
                                            <form method="POST" style="display:inline-block; padding-top: 10px; padding-bottom: 10px;" action="{{ route('admin.bulletins.publish', $bulletin->id) }}">
                                                {{ csrf_field() }}
                                                
                                                <input style="visibility: hidden; display: none" type="radio" name="published" id="published" value="true" checked>
                                                
                                                <button type="submit" class="btn btn-outline-success btn-block">Publicar</button>
                                            </form>
                                        @else
                                            <form method="POST" style="display:inline-block; padding-top: 10px; padding-bottom: 10px;" action="{{ route('admin.bulletins.publish', $bulletin->id) }}">
                                                {{ csrf_field() }}
                                                
                                                <input style="visibility: hidden; display: none" type="radio" name="published" id="published" value="false" checked>
                                                
                                                <button type="button" onclick="retry_action(event)" class="btn btn-outline-danger btn-block">Retirar</button>
                                            </form>
                                        @endif
                                            <form method="POST" style="display:inline-block" action="{{ route('admin.bulletins.destroy', $bulletin->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <button type="submit" class="btn btn-outline-danger btn-block">Eliminar</button>
                                            </form>
                                        </div>
                                </div>
                            @empty
                                <p>No hay Boletines</p>
                            @endforelse    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const retry_action = (e) => {
        e.preventDefault();
    
        Swal.fire({
            title: 'Estas seguro!',
            text: 'Estas eguro de eliminar este registro ?',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: 'hsl(120, 50%, 50%, 1)',
            cancelButtonColor: 'hsl(0, 50%, 50%, 1)',
            confirmButtonText: 'Yes !! '
        }).then(({value}) => {
            if (value) {
                e.target.form.submit()
            }
        })
};
</script>
@endsection