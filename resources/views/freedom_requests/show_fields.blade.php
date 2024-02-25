<!-- Iin Field -->
<div class="form-group">
    {!! Form::label('iin', 'ИИН:') !!}
    <p>{{ $freedomRequest->iin }}</p>
</div>

<!-- Mobile Phone Field -->
<div class="form-group">
    {!! Form::label('mobile_phone', 'Телефон:') !!}
    <p>{{ $freedomRequest->mobile_phone }}</p>
</div>

<!-- Verification Sms Code Field -->
<div class="form-group">
    {!! Form::label('verification_sms_code', 'Код верификации СМС:') !!}
    <p>{{ $freedomRequest->verification_sms_code }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Почта:') !!}
    <p>{{ $freedomRequest->email }}</p>
</div>

<!-- Product Field -->
<div class="form-group">
    {!! Form::label('product', 'Продукт:') !!}
    <p>{{ $freedomRequest->product }}</p>
</div>

<!-- Period Field -->
<div class="form-group">
    {!! Form::label('period', 'Период ( месяцы ):') !!}
    <p>{{ $freedomRequest->period }}</p>
</div>

<!-- Principal Field -->
<div class="form-group">
    {!! Form::label('principal', 'Сумма:') !!}
    <p>{{ $freedomRequest->principal }}</p>
</div>

<!-- Uuid Field -->
<div class="form-group">
    {!! Form::label('uuid', 'Уникальный идентификатор:') !!}
    <p>{{ $freedomRequest->uuid }}</p>
    <a href="{{route("freedom-info",$freedomRequest->uuid)}}">Посмотреть</a>
</div>

<!-- Is Success Field -->
<div class="form-group">
    {!! Form::label('is_success', 'Результат:') !!}
    <p>{{ $freedomRequest->is_success ? "Одобрено" : "Отклонено" }}</p>
</div>

