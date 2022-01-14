@extends('layouts.app')
@section('title','Show Human Surveillance Final')
@section('content')
    <section class="content-header">
        <h1>
            Human Surveillance Final
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('human_surveillance_finals.show_fields')
                    <a href="{!! route('humanSurveillanceFinals.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
