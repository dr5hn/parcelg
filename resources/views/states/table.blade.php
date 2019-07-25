<div class="table-responsive">
    <table class="table" id="states-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Country Id</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($states as $state)
            <tr>
                <td>{!! $state->name !!}</td>
            <td>{!! $state->country_id !!}</td>
            <td>{!! $state->status !!}</td>
                <td>
                    {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('states.show', [$state->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
