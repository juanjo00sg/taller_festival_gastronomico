
<div class="mb">
    {{ Form::label('comment', 'Comentario', ['class' => 'form-label']) }}
    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
<div class="mb">
    {{ Form::label('score', 'Puntaje', ['class' => 'form-label']) }}
    {{ Form::number('score', null, ['class' => 'form-control', 'maxlength' => 30]) }}
</div>
