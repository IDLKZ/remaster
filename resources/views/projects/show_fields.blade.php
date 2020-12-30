<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Заголовок:') !!}
    <p>{{ $project->title }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Картинка:') !!}
    <p><img src="/{{ $project->img }}" width="400"></p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    <p>{{ $project->description }}</p>
</div>

