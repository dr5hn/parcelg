<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gst Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gst_number', 'Gst Number:') !!}
    {!! Form::text('gst_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Pan Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pan_number', 'Pan Number:') !!}
    {!! Form::text('pan_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_user_id', 'Owner User Id:') !!}
    {!! Form::select('owner_user_id', ['Select User' => 'Select User'], null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('courierProviders.index') !!}" class="btn btn-default">Cancel</a>
</div>
