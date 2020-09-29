@extends('../layouts.master')
@section('cabecera')
@endsection
@section('contenido')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Editar Producto</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url("/images/{$articulo->imagen}") }}" class="card-img-top" alt="No se encontró la imagen">
            </div>

            <div class="col-md-6">
                {!! Form::model($articulo, ['files' => true, 'method' => 'PUT', 'route' => ['articulos.update',
                $articulo->id]]) !!}
                {!! Form::token() !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre del Artículo:') !!}
                    {!! Form::text('nombre', $articulo->nombre, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('precio', 'Precio:') !!}
                    {!! Form::text('precio', $articulo->precio, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('imagen', 'Cambiar imagen:') !!}
                    {!! Form::file('imagen', ['class' => 'form-control-file']) !!}
                </div>

                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                {!! Form::reset('Resetear', ['class' => 'btn btn-secondary']) !!}
                {!! Form::close() !!}

                <div class="form-group">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['articulos.destroy', $articulo->id]]) !!}
                    {!! Form::token() !!}
                    {!! Form::submit('Eliminar producto', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
