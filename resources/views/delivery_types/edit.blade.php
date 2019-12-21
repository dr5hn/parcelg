@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Delivery Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deliveryType, ['route' => ['deliveryTypes.update', $deliveryType->id], 'method' => 'patch']) !!}

                        @include('delivery_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection