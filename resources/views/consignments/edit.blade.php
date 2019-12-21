@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consignment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consignment, ['route' => ['consignments.update', $consignment->id], 'method' => 'patch']) !!}

                        @include('consignments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection