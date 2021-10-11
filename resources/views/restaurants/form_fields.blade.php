            <div class="mb mb-3">
                {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
            </div>
            <div class="mb mb-3 ">
                {{ Form::label('city', 'Ciudad', ['class' => 'form-label']) }}
                {{ Form::text('city', null, ['class' => 'form-control', 'maxlength' => 30]) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('phone', 'Teléfono', ['class' => 'form-label']) }}
                {{ Form::number('phone', null, ['class' => 'form-control', 'maxlength' => 10]) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('delivery', '¿Tiene domicilio?', ['class' => 'form-label']) }}
                {{ Form::select('delivery', ['y' => 'Si', 'n' => 'No'], null, ['class' => 'form-control']) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('category_id', 'Categoría', ['class' => 'form-label']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('schedule', 'Horario', ['class' => 'form-label']) }}
                {{ Form::text('schedule', null, ['class' => 'form-control']) }}
            </div>
            <div class=" mb mb-3">
                {{ Form::label('latitude', 'Latidud', ['class' => 'form-label']) }}
                {{ Form::text('latitude', null, ['class' => 'form-control', 'step' => 'any']) }}
            </div>
            <div class=" mb mb-3">
                {{ Form::label('longitude', 'Longitud', ['class' => 'form-label']) }}
                {{ Form::text('longitude', null, ['class' => 'form-control', 'step' => 'any']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('logo', 'Logo', ['class' => 'form-label']) }}
                {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/jpeg']) }}                 
            </div>
            <div class="mb mb-3">
                {{ Form::label('facebook', 'Facebook', ['class' => 'form-label']) }}
                {{ Form::text('facebook', null, ['class' => 'form-control']) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('twitter', 'Twitter', ['class' => 'form-label']) }}
                {{ Form::text('twitter', null, ['class' => 'form-control']) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('instagram', 'Instagram', ['class' => 'form-label']) }}
                {{ Form::text('instagram', null, ['class' => 'form-control']) }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('youtube', 'Youtube', ['class' => 'form-label']) }}
                {{ Form::text('youtube', null, ['class' => 'form-control']) }}
            </div>