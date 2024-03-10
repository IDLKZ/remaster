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
    {!! Form::label('is_success', 'Отправлено:') !!}
    <p>{{ $freedomRequest->is_success ? "Отправлено" : "Не отправлено" }}</p>
</div>

<!-- Result Field -->
<div class="form-group">
    {!! Form::label('result', 'Результат:') !!}
    <p>{{ $freedomRequest->result}}</p>
    <small>Rejected - отказно, Approved - одобрено, Issued - выдана</small>
</div>

<!-- alternative_reason Field -->
<div class="form-group">
    {!! Form::label('alternative_reason', 'Причина:') !!}
    <p>{{ $freedomRequest->alternative_reason}}</p>
</div>

<!-- alternative_reason Field -->
<div class="form-group">
    {!! Form::label('alternative_sum', 'Альтернативная сумма:') !!}
    <p>{{ $freedomRequest->alternative_sum}}</p>
</div>

<!-- alternative_reason Field -->
<div class="form-group">
    {!! Form::label('redirect_url', 'Ссылка для биоферификации:') !!}
    <p>{{ $freedomRequest->redirect_url}}</p>
</div>

<!-- interest_rate Field -->
<div class="form-group">
    {!! Form::label('interest_rate', 'Процентная ставка:') !!}
    <p>{{ $freedomRequest->interest_rate}}</p>
</div>

<!-- effective_rate Field -->
<div class="form-group">
    {!! Form::label('effective_rate', 'ЭПС ставка:') !!}
    <p>{{ $freedomRequest->effective_rate}}</p>
</div>

<!-- monthly_payment Field -->
<div class="form-group">
    {!! Form::label('monthly_payment', 'Месячная плата:') !!}
    <p>{{ $freedomRequest->monthly_payment}}</p>
</div>

<!-- is_phone_verified Field -->
<div class="form-group">
    {!! Form::label('is_phone_verified', 'Телефон подтвержден:') !!}
    <p>{{ $freedomRequest->is_phone_verified ? "Да" : "Нет"}}</p>
</div>

<!-- status Field -->
<div class="form-group">
    {!! Form::label('status', 'Конечный статус:') !!}
    <p>{{ $freedomRequest->status}}</p>
    <small>Rejected - отказно, Approved - одобрено, Issued - выдана</small>
</div>

<!-- credit_contract Field -->
<div class="form-group">
    {!! Form::label('credit_contract', 'Кредитный контракт:') !!}
    <p>{{ $freedomRequest->credit_contract}}</p>
</div>

<!-- credit_contract Field -->
<div class="form-group">
    {!! Form::label('first_name', 'Имя заявителя:') !!}
    <p>{{ $freedomRequest->first_name}}</p>
</div>
<!-- last_name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Фамилия заявителя:') !!}
    <p>{{ $freedomRequest->last_name}}</p>
</div>

<!-- middle_name Field -->
<div class="form-group">
    {!! Form::label('middle_name', 'Отчество заявителя:') !!}
    <p>{{ $freedomRequest->middle_name}}</p>
</div>
<!-- reference_id Field -->
<div class="form-group">
    {!! Form::label('reference_id', 'Уникальный ID заявки:') !!}
    <p>{{ $freedomRequest->reference_id}}</p>
</div>

<!-- with_card Field -->
<div class="form-group">
    {!! Form::label('with_card', 'С картой:') !!}
    <p>{{ $freedomRequest->with_card ? "Да" : "Нет"}}</p>
</div>

<!-- status_code Field -->
<div class="form-group">
    {!! Form::label('status_code', 'Код статуса:') !!}
    <p>{{ $freedomRequest->status_code}}</p>
</div>
