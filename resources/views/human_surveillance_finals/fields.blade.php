<!-- Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('id') ? 'has-error' :'' }}">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
    {!! $errors->first('id','<span class="help-block">:message</span>') !!}
</div>


<!-- Upload Header Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('upload_header_id') ? 'has-error' :'' }}">
    {!! Form::label('upload_header_id', 'Upload Header Id:') !!}
    {!! Form::number('upload_header_id', null, ['class' => 'form-control']) !!}
    {!! $errors->first('upload_header_id','<span class="help-block">:message</span>') !!}
</div>


<!-- Organisation Unit Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('organisation_unit_name') ? 'has-error' :'' }}">
    {!! Form::label('organisation_unit_name', 'Organisation Unit Name:') !!}
    {!! Form::text('organisation_unit_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('organisation_unit_name','<span class="help-block">:message</span>') !!}
</div>


<!-- Organisation Unit Code Field -->
<div class="form-group col-sm-6 {{ $errors->has('organisation_unit_code') ? 'has-error' :'' }}">
    {!! Form::label('organisation_unit_code', 'Organisation Unit Code:') !!}
    {!! Form::text('organisation_unit_code', null, ['class' => 'form-control']) !!}
    {!! $errors->first('organisation_unit_code','<span class="help-block">:message</span>') !!}
</div>


<!-- Disease Field -->
<div class="form-group col-sm-6 {{ $errors->has('disease') ? 'has-error' :'' }}">
    {!! Form::label('disease', 'Disease:') !!}
    {!! Form::text('disease', null, ['class' => 'form-control']) !!}
    {!! $errors->first('disease','<span class="help-block">:message</span>') !!}
</div>


<!-- One Month To Below Five Year Field -->
<div class="form-group col-sm-6 {{ $errors->has('one_month_to_below_five_year') ? 'has-error' :'' }}">
    {!! Form::label('one_month_to_below_five_year', 'One Month To Below Five Year:') !!}
    {!! Form::number('one_month_to_below_five_year', null, ['class' => 'form-control']) !!}
    {!! $errors->first('one_month_to_below_five_year','<span class="help-block">:message</span>') !!}
</div>


<!-- Five To Below Sixty Years Field -->
<div class="form-group col-sm-6 {{ $errors->has('five_to_below_sixty_years') ? 'has-error' :'' }}">
    {!! Form::label('five_to_below_sixty_years', 'Five To Below Sixty Years:') !!}
    {!! Form::number('five_to_below_sixty_years', null, ['class' => 'form-control']) !!}
    {!! $errors->first('five_to_below_sixty_years','<span class="help-block">:message</span>') !!}
</div>


<!-- Observation Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('observation_date') ? 'has-error' :'' }}">
    {!! Form::label('observation_date', 'Observation Date:') !!}
    {!! Form::text('observation_date', null, ['class' => 'form-control']) !!}
    {!! $errors->first('observation_date','<span class="help-block">:message</span>') !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('humanSurveillanceFinals.index') !!}" class="btn btn-default">Cancel</a>
</div>
