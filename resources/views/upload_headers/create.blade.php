@extends('layouts.app')
@section('title','New Upload Header')
@section('content')
    <section class="content-header">
        <h1>
            Upload Header
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'uploadHeaders.store']) !!}

                        @include('upload_headers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
