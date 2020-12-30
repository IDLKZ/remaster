<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Заголовок:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtitle', 'Подзаголовок:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Skill Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill', 'Опыт работы:') !!}
    {!! Form::number('skill', null, ['class' => 'form-control']) !!}
</div>

<!-- Skill Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill_title', 'Описание опыта работы:') !!}
    {!! Form::textarea('skill_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Projects Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projects', 'Количество проектов:') !!}
    {!! Form::number('projects', null, ['class' => 'form-control']) !!}
</div>

<!-- Projects Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projects_title', 'Описание проектов:') !!}
    {!! Form::textarea('projects_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Warranty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty', 'Гарантия:') !!}
    {!! Form::text('warranty', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Warranty Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty_title', 'Описание гаранта:') !!}
    {!! Form::textarea('warranty_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Отмена</a>
</div>
