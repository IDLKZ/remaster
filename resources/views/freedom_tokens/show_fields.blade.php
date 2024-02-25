<!-- Refresh Token Field -->
<div class="form-group">
    {!! Form::label('refresh_token', 'Refresh Token:') !!}
    <p>{{ $freedomToken->refresh_token }}</p>
</div>

<!-- Access Token Field -->
<div class="form-group">
    {!! Form::label('access_token', 'Access Token:') !!}
    <p>{{ $freedomToken->access_token }}</p>
</div>

