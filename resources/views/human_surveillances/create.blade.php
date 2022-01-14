@extends('layouts.app')
@section('title','New Human Surveillance')
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
                    {!! Form::open(['route' => 'humanSurveillances.store']) !!}

                        @include('human_surveillances.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
