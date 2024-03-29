<!-- Refresh Token Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('refresh_token', 'Refresh Token:') !!}
    {!! Form::textarea('refresh_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Access Token Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('access_token', 'Access Token:') !!}
    {!! Form::textarea('access_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('freedomTokens.index') }}" class="btn btn-secondary">Cancel</a>
</div>
