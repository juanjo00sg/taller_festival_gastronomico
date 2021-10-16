@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Comentarios del restaurante</h1>

        @foreach ($comments as $comm)
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Usuario:</label>
                    </div>
                    <div class="col-md-4">                                             
                        <label for="">{{ $comm->user->name }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Comentario:</label>
                    </div>
                    <div class="col-md-4">
                        <label for="">{{ $comm->comment }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Puntaje:</label>
                    </div>
                    <div class="col-md-4">
                        @for ($i = 0; $i < $comm->score; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        <label for=""></label>

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
