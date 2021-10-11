@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>
            <small class="text-muted">{{strtoupper($user->type)}}</small>
            {{ $user->name }}
        </h3>
        
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-warning mt-3" href="{{ route('users.edit', $user->id) }}">Editar</a>

            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el usuario?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection