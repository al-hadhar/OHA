@extends('layouts.app')
@section('title','Edit Animal Surveillance Final')
@section('content')
    <section class="content-header">
        <h1>
            Animal Surveillance Final
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($animalSurveillanceFinal, ['route' => ['animalSurveillanceFinals.update', $animalSurveillanceFinal->id], 'method' => 'patch']) !!}

                        @include('animal_surveillance_finals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
