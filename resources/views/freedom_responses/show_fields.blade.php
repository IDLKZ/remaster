<!-- Data Field -->
<div class="form-group">
    {!! Form::label('data', 'Data:') !!}
    <pre> {{ json_encode($freedomResponse->data)}}</pre>
</div>

<!-- Success Field -->
<div class="form-group">
    {!! Form::label('success', 'Success:') !!}
    <p>{{ $freedomResponse->success }}</p>
</div>

