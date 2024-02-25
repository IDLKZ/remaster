<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Заголовок:') !!}
    <p>{{ $advantage->title }}</p>
</div>

<!-- Sub Title Field -->
<div class="form-group">
    {!! Form::label('sub_title', 'Подзаголовок:') !!}
    <p>{{ $advantage->sub_title }}</p>
</div>

<!-- Image Url Field -->
<div class="form-group">
    {!! Form::label('image_url', 'Изображение:') !!}
    <img src="{{ $advantage->image_url }}">
</div>

