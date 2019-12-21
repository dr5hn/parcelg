<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', ['Select User' => 'Select User'], null, ['class' => 'form-control']) !!}
</div>

<!-- Notification Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notification_type_id', 'Notification Type Id:') !!}
    {!! Form::select('notification_type_id', ['Select Notification Type' => 'Select Notification Type'], null, ['class' => 'form-control']) !!}
</div>

<!-- Channel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('channel', 'Channel:') !!}
    {!! Form::select('channel', ['SMS' => 'SMS', ' Email' => ' Email', ' Slack' => ' Slack', ' Browser' => ' Browser', ' App' => ' App'], null, ['class' => 'form-control']) !!}
</div>

<!-- Schedule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule', 'Schedule:') !!}
    {!! Form::date('schedule', null, ['class' => 'form-control','id'=>'schedule']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#schedule').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Draft' => 'Draft', ' Pending' => ' Pending', ' Sent' => ' Sent', ' Failed' => ' Failed', ' Cancelled' => ' Cancelled'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('notifications.index') !!}" class="btn btn-default">Cancel</a>
</div>
