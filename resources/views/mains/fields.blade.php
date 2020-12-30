<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Заголовок:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtitle', 'Подзаголовок:') !!}
    {!! Form::textarea('subtitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Field -->
<div class="form-group col-sm-6">
    {!! Form::label('background', 'Задний фон:') !!}
    {!! Form::file('background') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mains.index') }}" class="btn btn-secondary">Отмена</a>
</div>
