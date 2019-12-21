@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bill Ship Address
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'billShipAddresses.store']) !!}

                        @include('bill_ship_addresses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
