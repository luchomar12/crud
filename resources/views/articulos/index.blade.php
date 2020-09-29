@extends('../layouts.master')


@section('cabecera')

@endsection




@section('contenido')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Productos</h1>
                  <a style="margin: 19px;" href="{{ url('/articulos/create') }}" class="btn btn-primary">Nuevo Producto</a>
                  </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($articulos as $articulo)
                <div class="col-lg-4" style="padding-bottom: 10px">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url("/images/{$articulo->imagen}") }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $articulo->nombre }}</h5>
                            <p class="card-text">Precio: ${{ $articulo->precio }}</p>
                            <a href="{{ url("/articulos/{$articulo->id}") }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection






@section('footer')

@endsection
