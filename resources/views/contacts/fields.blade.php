<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Номер телефона:*') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'id' => 'phone']) !!}
</div>

<!-- Telegram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telegram', 'Telegram:') !!}
    {!! Form::text('telegram', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'placeholder' => 'вставьте ссылку']) !!}
</div>

<!-- Instagram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram', 'Instagram:') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'placeholder' => 'вставьте ссылку']) !!}
</div>

<!-- Facebook Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'placeholder' => 'вставьте ссылку']) !!}
</div>

<!-- Youtube Field -->
<div class="form-group col-sm-6">
    {!! Form::label('youtube', 'Youtube:') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'placeholder' => 'вставьте ссылку']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:*') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Отмена</a>
</div>
