<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Iso2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso2', 'Iso2:') !!}
    {!! Form::text('iso2', null, ['class' => 'form-control']) !!}
</div>

<!-- Iso3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso3', 'Iso3:') !!}
    {!! Form::text('iso3', null, ['class' => 'form-control']) !!}
</div>

<!-- Phonecode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phonecode', 'Phonecode:') !!}
    {!! Form::text('phonecode', null, ['class' => 'form-control']) !!}
</div>

<!-- Capital Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capital', 'Capital:') !!}
    {!! Form::text('capital', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Status Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('countries.index') !!}" class="btn btn-default">Cancel</a>
</div>
