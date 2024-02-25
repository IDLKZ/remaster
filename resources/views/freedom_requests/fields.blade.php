<!-- Iin Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iin', 'Iin:') !!}
    {!! Form::textarea('iin', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mobile_phone', 'Mobile Phone:') !!}
    {!! Form::textarea('mobile_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Verification Sms Code Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('verification_sms_code', 'Verification Sms Code:') !!}
    {!! Form::textarea('verification_sms_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('product', 'Product:') !!}
    {!! Form::textarea('product', null, ['class' => 'form-control']) !!}
</div>

<!-- Period Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('period', 'Period:') !!}
    {!! Form::textarea('period', null, ['class' => 'form-control']) !!}
</div>

<!-- Principal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('principal', 'Principal:') !!}
    {!! Form::textarea('principal', null, ['class' => 'form-control']) !!}
</div>

<!-- Uuid Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::textarea('uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Success Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_success', 'Is Success:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_success', 0) !!}
        {!! Form::checkbox('is_success', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('freedomRequests.index') }}" class="btn btn-secondary">Cancel</a>
</div>
