@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Documents
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($documents, ['route' => ['documents.update', $documents->id], 'method' => 'patch']) !!}

                        @include('documents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection