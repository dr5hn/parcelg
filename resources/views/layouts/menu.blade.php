
<li class="{{ Request::is('userTypes*') ? 'active' : '' }}">
    <a href="{!! route('userTypes.index') !!}"><i class="fa fa-edit"></i><span>User Types</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


