@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userType, ['route' => ['userTypes.update', $userType->id], 'method' => 'patch']) !!}

                        @include('user_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection