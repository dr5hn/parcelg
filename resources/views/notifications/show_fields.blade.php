<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $notifications->id !!}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $notifications->message !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $notifications->user_id !!}</p>
</div>

<!-- Notification Type Id Field -->
<div class="form-group">
    {!! Form::label('notification_type_id', 'Notification Type Id:') !!}
    <p>{!! $notifications->notification_type_id !!}</p>
</div>

<!-- Channel Field -->
<div class="form-group">
    {!! Form::label('channel', 'Channel:') !!}
    <p>{!! $notifications->channel !!}</p>
</div>

<!-- Schedule Field -->
<div class="form-group">
    {!! Form::label('schedule', 'Schedule:') !!}
    <p>{!! $notifications->schedule !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $notifications->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $notifications->updated_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $notifications->status !!}</p>
</div>

