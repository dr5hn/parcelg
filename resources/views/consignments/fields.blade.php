<!-- Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    {!! Form::select('provider_id', ['Select Provider' => 'Select Provider'], null, ['class' => 'form-control']) !!}
</div>

<!-- Consignment Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consignment_type_id', 'Consignment Type Id:') !!}
    {!! Form::select('consignment_type_id', ['Select Consignment Type' => 'Select Consignment Type'], null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_type_id', 'Delivery Type Id:') !!}
    {!! Form::select('delivery_type_id', ['Select Delivery Type' => 'Select Delivery Type'], null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', 'Rate:') !!}
    {!! Form::number('rate', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('consignments.index') !!}" class="btn btn-default">Cancel</a>
</div>
