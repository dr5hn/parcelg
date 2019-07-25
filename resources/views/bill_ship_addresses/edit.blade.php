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
                   {!! Form::model($billShipAddress, ['route' => ['billShipAddresses.update', $billShipAddress->id], 'method' => 'patch']) !!}

                        @include('bill_ship_addresses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection