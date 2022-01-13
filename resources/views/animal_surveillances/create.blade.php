@extends('layouts.app')
@section('title','New Animal Surveillance')
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
                    {!! Form::open(['route' => 'animalSurveillances.store']) !!}

                        @include('animal_surveillances.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
