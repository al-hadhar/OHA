@extends('layouts.app')
@section('title','Edit Human Surveillance Final')
@section('content')
    <section class="content-header">
        <h1>
            Human Surveillance Final
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($humanSurveillanceFinal, ['route' => ['humanSurveillanceFinals.update', $humanSurveillanceFinal->id], 'method' => 'patch']) !!}

                        @include('human_surveillance_finals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
