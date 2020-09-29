@extends('../layouts.master')
@section('cabecera')
@endsection
@section('contenido')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Mostrar Producto</h1>
        </div>
    </div>
    <div class="container flex-d">
        
        <div class="row">
            
            <div class="col-lg-8">
                <img src="{{ url("/images/{$articulo->imagen}") }}" class="img-fluid rounded" alt="No se encontró la imagen">
                </div>

                <div class="col-lg-4">
                    <div class="card-body">
                        <h5 class="card-title">Nombre: {{ $articulo->nombre }}</h5>
                        <p class="card-text">Precio: ${{ $articulo->precio }}</p>
                        <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-primary btn-block">Editar</a>
                    </div>
                </div>

            </div>
        
    </div>
@endsection
@section('footer')
@endsection
