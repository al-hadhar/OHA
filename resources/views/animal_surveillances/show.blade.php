@extends('layouts.app')
@section('title','Show Animal Surveillance')
@section('content')
    <section class="content-header">
        <h1>
            Animal Surveillance
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('animal_surveillances.show_fields')
                    <a href="{!! route('animalSurveillances.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
