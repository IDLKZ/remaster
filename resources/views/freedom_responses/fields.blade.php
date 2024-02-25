<!-- Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::textarea('data', null, ['class' => 'form-control']) !!}
</div>

<!-- Success Field -->
<div class="form-group col-sm-6">
    {!! Form::label('success', 'Success:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('success', 0) !!}
        {!! Form::checkbox('success', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('freedomResponses.index') }}" class="btn btn-secondary">Cancel</a>
</div>
