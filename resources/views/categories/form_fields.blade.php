<div class="mb mb-3">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 40]) }}
</div>
<div class="mb mb-3">
    {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
