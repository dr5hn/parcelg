<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $consignment->id !!}</p>
</div>

<!-- Provider Id Field -->
<div class="form-group">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    <p>{!! $consignment->provider_id !!}</p>
</div>

<!-- Consignment Type Id Field -->
<div class="form-group">
    {!! Form::label('consignment_type_id', 'Consignment Type Id:') !!}
    <p>{!! $consignment->consignment_type_id !!}</p>
</div>

<!-- Delivery Type Id Field -->
<div class="form-group">
    {!! Form::label('delivery_type_id', 'Delivery Type Id:') !!}
    <p>{!! $consignment->delivery_type_id !!}</p>
</div>

<!-- Rate Field -->
<div class="form-group">
    {!! Form::label('rate', 'Rate:') !!}
    <p>{!! $consignment->rate !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $consignment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $consignment->updated_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $consignment->status !!}</p>
</div>

