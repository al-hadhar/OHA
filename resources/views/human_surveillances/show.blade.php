@extends('layouts.app')
@section('title','Show Human Surveillance')
@section('content')
    <section class="content-header">
        <h1>
            Human Surveillance
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('human_surveillances.show_fields')
                    <a href="{!! route('humanSurveillances.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
