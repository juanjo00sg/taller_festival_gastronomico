@extends('layouts.app')
@section('content')
    <div class="container">      

        <h3>
            <small class="text-muted">Categoría: </small>
            {{ $category->name }}
        </h3>
        <br>
        <h5>{{$category-> description}}</h5>


        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-warning mt-3" href="{{ route('categories.edit', $category->id) }}">Editar</a>

            {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover la categoria?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
