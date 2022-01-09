@extends('layouts.app')
@section('title','Edit Upload Header')
@section('content')
    <section class="content-header">
        <h1>
            Upload Header
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($uploadHeader, ['route' => ['uploadHeaders.update', $uploadHeader->id], 'method' => 'patch']) !!}

                        @include('upload_headers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
