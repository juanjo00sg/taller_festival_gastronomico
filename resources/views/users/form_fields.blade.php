<div class="mb mb-3">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="mb mb-3">
    {{ Form::label('email', 'Correo Electrónico', ['class' => 'form-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="mb mb-3">
    {{ Form::label('type', 'Tipo de Usuario', ['class' => 'form-label']) }}
    {{ Form::select('type', ['admin'=>'Administrador', 'owner'=>'Propietario', 'user'=>'Usuario'], null, ['class' => 'form-control']) }}
</div>
<div class="mb mb-3">
    {{ Form::label('password', 'Contraseña', ['class' => 'form-label']) }}
    {{ Form::password('password', ['class' => 'form-control', 'required']) }}
</div>
<div class="mb mb-3">
    {{ Form::label('password-confirm', 'Confirmar Contraseña', ['class' => 'form-label']) }}
    {{ Form::password('password-confirm', ['class' => 'form-control', 'required']) }}
</div>
