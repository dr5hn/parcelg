@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Courier Provider Users
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($courierProviderUsers, ['route' => ['courierProviderUsers.update', $courierProviderUsers->id], 'method' => 'patch']) !!}

                        @include('courier_provider_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection