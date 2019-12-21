@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Courier Provider
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($courierProvider, ['route' => ['courierProviders.update', $courierProvider->id], 'method' => 'patch']) !!}

                        @include('courier_providers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection