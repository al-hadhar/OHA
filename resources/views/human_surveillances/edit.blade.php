@extends('layouts.app')
@section('title','Edit Human Surveillance')
@section('content')
    <section class="content-header">
        <h1>
            Human Surveillance
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($humanSurveillance, ['route' => ['humanSurveillances.update', $humanSurveillance->id], 'method' => 'patch']) !!}

                        @include('human_surveillances.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
