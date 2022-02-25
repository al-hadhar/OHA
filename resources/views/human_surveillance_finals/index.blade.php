@extends('layouts.app')
@section('title','List Human Surveillance Finals')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Human Surveillance Finals</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('humanSurveillanceFinals.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('human_surveillance_finals.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

