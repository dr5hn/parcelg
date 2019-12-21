@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consignment Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consignmentType, ['route' => ['consignmentTypes.update', $consignmentType->id], 'method' => 'patch']) !!}

                        @include('consignment_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection