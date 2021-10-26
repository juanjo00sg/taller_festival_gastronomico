@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <?php
            $img = $restaurant->logo ?? 'restaurant.png';
            ?>
            <div class="card-header text-center">
                {{ $restaurant->category->name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $restaurant->name }}</h5>
                <p class="card-text">{{ $restaurant->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Horario: {{ $restaurant->schedule }}</li>
                <li class="list-group-item">Contactenos al {{ $restaurant->phone }}</li>
                @if ($restaurant->delivery == 'y')
                    <li class="list-group-item">Tenemos Domicilo</li>
                @endif
                <li class="list-group-item">Nuestras redes sociales <br>
                    <i class="fab fa-facebook-square"></i>{{ $restaurant->facebook }} <br>
                    <i class="fab fa-instagram"></i>{{ $restaurant->instagram }} <br>
                    <i class="fab fa-twitter-square"></i>{{ $restaurant->twitter }} <br>
                    <i class="fab fa-youtube"></i>{{ $restaurant->youtube }}
                </li>

            </ul>
            <div class="text-center">
                <img src="{{ asset('images/restaurants/' . $img) }}" class="card-img-bottom img-fluid"
                    style="width: 20rem">
            </div>
            @auth
                @if (auth()->user()->type == 'admin' || auth()->user()->type == 'owner')
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning mt-3"
                                href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

                            {{ Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')']) }}
                            <button type="submit" class="btn btn-danger mt-3">Remover</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            @endauth

        </div>
    </div>

@endsection
