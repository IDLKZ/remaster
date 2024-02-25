<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Заголовок:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sub_title', 'Подзаголовок:') !!}
    {!! Form::textarea('sub_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Url Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image_url', 'Изображение:') !!}
    {!! Form::file('image_url') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('advantages.index') }}" class="btn btn-secondary">Отмена</a>
</div>
