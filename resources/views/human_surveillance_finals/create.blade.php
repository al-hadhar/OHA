@extends('layouts.app')
@section('title','New Human Surveillance Final')
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
                    {!! Form::open(['route' => 'humanSurveillanceFinals.store']) !!}

                        @include('human_surveillance_finals.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
