{{-- @extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Comentarios del restaurante</h1>

        {{ Form::open(['url' => route('comments.index'), 'method' => 'get']) }}
        <div class="input-group mb-3 mt-1">
                {{ Form::select('filter', $comments, $filter, ['class' => 'form-control', 'aria-describedby' => 'button-filter']) }}
                {{ Form::button('<i class="fas fa-search"></i>', [
                    'class' => 'btn btn-info', 
                    'id' => 'button-filter',
                    {{-- 'onclick' => 'submit()', 
                    'type' => 'submit'
                ]) }}
        </div>
        {!! Form::close() !!}

    
            @foreach ($comments as $comm)
            <div class="row">
                <textarea for="">{{$comm->comment}}</textarea>
                <label for="">{{$comm->score}}</label>
            </div>
            @endforeach
     

      {{--   {{ $restaurants->links() }}
    </div>

@endsection --}}
