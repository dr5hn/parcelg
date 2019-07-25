<!-- Proof Of Identity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proof_of_identity', 'Proof Of Identity:') !!}
    {!! Form::file('proof_of_identity') !!}
</div>
<div class="clearfix"></div>

<!-- Proof Of Identity Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proof_of_identity_type', 'Proof Of Identity Type:') !!}
    {!! Form::text('proof_of_identity_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Proof Of Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proof_of_address', 'Proof Of Address:') !!}
    {!! Form::file('proof_of_address') !!}
</div>
<div class="clearfix"></div>

<!-- Proof Of Address Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proof_of_address_type', 'Proof Of Address Type:') !!}
    {!! Form::text('proof_of_address_type', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Verification Status Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('verification_status', 'Verification Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('verification_status', 0) !!}
        {!! Form::checkbox('verification_status', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancel</a>
</div>
