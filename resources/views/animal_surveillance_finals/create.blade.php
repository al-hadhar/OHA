@extends('layouts.app')
@section('title','New Animal Surveillance Final')
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
                    {!! Form::open(['route' => 'animalSurveillanceFinals.store']) !!}

                        @include('animal_surveillance_finals.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
