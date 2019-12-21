@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notification Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notificationType, ['route' => ['notificationTypes.update', $notificationType->id], 'method' => 'patch']) !!}

                        @include('notification_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection