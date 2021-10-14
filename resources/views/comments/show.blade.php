@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Comentarios del restaurante</h1>



        @foreach ($comments as $comm)
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
                    <label for="">{{ $comm->score }}</label>

                </div>
            </div>
        @endforeach


        {{-- {{ $restaurants->links() }} --}}
    </div>

@endsection
