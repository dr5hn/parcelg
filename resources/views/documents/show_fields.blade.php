<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $documents->id !!}</p>
</div>

<!-- Proof Of Identity Field -->
<div class="form-group">
    {!! Form::label('proof_of_identity', 'Proof Of Identity:') !!}
    <p>{!! $documents->proof_of_identity !!}</p>
</div>

<!-- Proof Of Identity Type Field -->
<div class="form-group">
    {!! Form::label('proof_of_identity_type', 'Proof Of Identity Type:') !!}
    <p>{!! $documents->proof_of_identity_type !!}</p>
</div>

<!-- Proof Of Address Field -->
<div class="form-group">
    {!! Form::label('proof_of_address', 'Proof Of Address:') !!}
    <p>{!! $documents->proof_of_address !!}</p>
</div>

<!-- Proof Of Address Type Field -->
<div class="form-group">
    {!! Form::label('proof_of_address_type', 'Proof Of Address Type:') !!}
    <p>{!! $documents->proof_of_address_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $documents->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $documents->updated_at !!}</p>
</div>

<!-- Verification Status Field -->
<div class="form-group">
    {!! Form::label('verification_status', 'Verification Status:') !!}
    <p>{!! $documents->verification_status !!}</p>
</div>

