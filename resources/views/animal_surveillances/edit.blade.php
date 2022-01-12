@extends('layouts.app')
@section('title','Edit Animal Surveillance')
@section('content')
    <section class="content-header">
        <h1>
            Animal Surveillance
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($animalSurveillance, ['route' => ['animalSurveillances.update', $animalSurveillance->id], 'method' => 'patch']) !!}

                        @include('animal_surveillances.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
