@extends('layouts.app')
@section('title','Show Animal Surveillance Final')
@section('content')
    <section class="content-header">
        <h1>
            Animal Surveillance Final
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('animal_surveillance_finals.show_fields')
                    <a href="{!! route('animalSurveillanceFinals.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
