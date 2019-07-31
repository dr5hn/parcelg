<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $notificationType->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $notificationType->type !!}</p>
</div>

<!-- Template Field -->
<div class="form-group">
    {!! Form::label('template', 'Template:') !!}
    <p>{!! $notificationType->template !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $notificationType->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $notificationType->updated_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $notificationType->status !!}</p>
</div>

