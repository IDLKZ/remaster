<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Заголовок:') !!}
    <p>{{ $main->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Подзаголовок:') !!}
    <p>{!! $main->subtitle !!}</p>
</div>

<!-- Background Field -->
<div class="form-group">
    {!! Form::label('background', 'Задний фон:') !!}
    <p><img src="/{{ $main->background }}" width="400"></p>
</div>

