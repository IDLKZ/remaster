<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Заголовок:') !!}
    <p>{{ $about->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Подзаголовок:') !!}
    <p>{{ $about->subtitle }}</p>
</div>

<!-- Skill Field -->
<div class="form-group">
    {!! Form::label('skill', 'Опыт работы:') !!}
    <p>{{ $about->skill }}</p>
</div>

<!-- Skill Title Field -->
<div class="form-group">
    {!! Form::label('skill_title', 'Описание опыта работы:') !!}
    {!! $about->skill_title !!}
</div>

<!-- Projects Field -->
<div class="form-group">
    {!! Form::label('projects', 'Количество проектов:') !!}
    <p>{{ $about->projects }}</p>
</div>

<!-- Projects Title Field -->
<div class="form-group">
    {!! Form::label('projects_title', 'Описание проектов:') !!}
    {!! $about->projects_title !!}
</div>

<!-- Warranty Field -->
<div class="form-group">
    {!! Form::label('warranty', 'Гарантия:') !!}
    <p>{{ $about->warranty }}</p>
</div>

<!-- Warranty Title Field -->
<div class="form-group">
    {!! Form::label('warranty_title', 'Описание гаранта:') !!}
    {!! $about->warranty_title !!}
</div>

