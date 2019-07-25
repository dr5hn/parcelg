
<li class="{{ Request::is('userTypes*') ? 'active' : '' }}">
    <a href="{!! route('userTypes.index') !!}"><i class="fa fa-edit"></i><span>User Types</span></a>
</li>



<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('states*') ? 'active' : '' }}">
    <a href="{!! route('states.index') !!}"><i class="fa fa-edit"></i><span>States</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('billShipAddresses*') ? 'active' : '' }}">
    <a href="{!! route('billShipAddresses.index') !!}"><i class="fa fa-edit"></i><span>Bill Ship Addresses</span></a>
</li>

<li class="{{ Request::is('documents*') ? 'active' : '' }}">
    <a href="{!! route('documents.index') !!}"><i class="fa fa-edit"></i><span>Documents</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('courierProviders*') ? 'active' : '' }}">
    <a href="{!! route('courierProviders.index') !!}"><i class="fa fa-edit"></i><span>Courier Providers</span></a>
</li>

