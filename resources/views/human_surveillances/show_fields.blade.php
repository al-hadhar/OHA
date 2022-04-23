<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $humanSurveillance->id }}</p>
</div>


<!-- Upload Header Id Field -->
<div class="form-group">
    {!! Form::label('upload_header_id', 'Upload Header Id:') !!}
    <p>{{ $humanSurveillance->upload_header_id }}</p>
</div>


<!-- Organisation Unit Name Field -->
<div class="form-group">
    {!! Form::label('organisation_unit_name', 'Organisation Unit Name:') !!}
    <p>{{ $humanSurveillance->organisation_unit_name }}</p>
</div>


<!-- Organisation Unit Code Field -->
<div class="form-group">
    {!! Form::label('organisation_unit_code', 'Organisation Unit Code:') !!}
    <p>{{ $humanSurveillance->organisation_unit_code }}</p>
</div>


<!-- Disease Field -->
<div class="form-group">
    {!! Form::label('disease', 'Disease:') !!}
    <p>{{ $humanSurveillance->disease }}</p>
</div>


<!-- Zero Year Field -->
<div class="form-group">
    {!! Form::label('zero_year', 'Zero Year:') !!}
    <p>{{ $humanSurveillance->zero_year }}</p>
</div>


<!-- One To Below Five Years Field -->
<div class="form-group">
    {!! Form::label('one_to_below_five_years', 'One To Below Five Years:') !!}
    <p>{{ $humanSurveillance->one_to_below_five_years }}</p>
</div>


<!-- Five To Below Sixty Years Field -->
<div class="form-group">
    {!! Form::label('five_to_below_sixty_years', 'Five To Below Sixty Years:') !!}
    <p>{{ $humanSurveillance->five_to_below_sixty_years }}</p>
</div>


<!-- Observation Date Field -->
<div class="form-group">
    {!! Form::label('observation_date', 'Observation Date:') !!}
    <p>{{ $humanSurveillance->observation_date }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $humanSurveillance->status }}</p>
</div>


<!-- Valid Status Field -->
<div class="form-group">
    {!! Form::label('valid_status', 'Valid Status:') !!}
    <p>{{ $humanSurveillance->valid_status }}</p>
</div>


<!-- Reject Reason Field -->
<div class="form-group">
    {!! Form::label('reject_reason', 'Reject Reason:') !!}
    <p>{{ $humanSurveillance->reject_reason }}</p>
</div>


