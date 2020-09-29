@extends('../layouts.master')
@section('cabecera')
@endsection
@section('contenido')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Crear Producto</h1>
        </div>
    </div>
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {!! Form::open(['url' => '/articulos', 'method' => 'POST', 'files' => true]) !!}
        {!! Form::token() !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del Artículo:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('precio', 'Precio:') !!}
            {!! Form::text('precio', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagen', 'Imagen:') !!}
            {!! Form::file('imagen', ['class' => 'form-control-file']) !!}
        </div>
        {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
        {!! Form::reset('Resetear', ['class' => 'btn btn-secondary']) !!}
        {!! Form::close() !!}

    </div>

@endsection
@section('footer')
@endsection
