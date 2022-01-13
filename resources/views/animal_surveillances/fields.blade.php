<!-- Region Field -->
<div class="form-group col-sm-6 {{ $errors->has('region') ? 'has-error' :'' }}">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::text('region', null, ['class' => 'form-control']) !!}
    {!! $errors->first('region','<span class="help-block">:message</span>') !!}
</div>


<!-- District Field -->
<div class="form-group col-sm-6 {{ $errors->has('district') ? 'has-error' :'' }}">
    {!! Form::label('district', 'District:') !!}
    {!! Form::text('district', null, ['class' => 'form-control']) !!}
    {!! $errors->first('district','<span class="help-block">:message</span>') !!}
</div>


<!-- Village Field -->
<div class="form-group col-sm-6 {{ $errors->has('village') ? 'has-error' :'' }}">
    {!! Form::label('village', 'Village:') !!}
    {!! Form::text('village', null, ['class' => 'form-control']) !!}
    {!! $errors->first('village','<span class="help-block">:message</span>') !!}
</div>


<!-- Observation Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('observation_date') ? 'has-error' :'' }}">
    {!! Form::label('observation_date', 'Observation Date:') !!}
    {!! Form::text('observation_date', null, ['class' => 'form-control']) !!}
    {!! $errors->first('observation_date','<span class="help-block">:message</span>') !!}
</div>


<!-- Disease Field -->
<div class="form-group col-sm-6 {{ $errors->has('disease') ? 'has-error' :'' }}">
    {!! Form::label('disease', 'Disease:') !!}
    {!! Form::text('disease', null, ['class' => 'form-control']) !!}
    {!! $errors->first('disease','<span class="help-block">:message</span>') !!}
</div>


<!-- Specie Affected Field -->
<div class="form-group col-sm-6 {{ $errors->has('specie_affected') ? 'has-error' :'' }}">
    {!! Form::label('specie_affected', 'Specie Affected:') !!}
    {!! Form::text('specie_affected', null, ['class' => 'form-control']) !!}
    {!! $errors->first('specie_affected','<span class="help-block">:message</span>') !!}
</div>


<!-- Cases Field -->
<div class="form-group col-sm-6 {{ $errors->has('cases') ? 'has-error' :'' }}">
    {!! Form::label('cases', 'Cases:') !!}
    {!! Form::text('cases', null, ['class' => 'form-control']) !!}
    {!! $errors->first('cases','<span class="help-block">:message</span>') !!}
</div>


<!-- Death Field -->
<div class="form-group col-sm-6 {{ $errors->has('death') ? 'has-error' :'' }}">
    {!! Form::label('death', 'Death:') !!}
    {!! Form::text('death', null, ['class' => 'form-control']) !!}
    {!! $errors->first('death','<span class="help-block">:message</span>') !!}
</div>


<!-- Not At Rist Field -->
<div class="form-group col-sm-6 {{ $errors->has('not_at_rist') ? 'has-error' :'' }}">
    {!! Form::label('not_at_rist', 'Not At Rist:') !!}
    {!! Form::text('not_at_rist', null, ['class' => 'form-control']) !!}
    {!! $errors->first('not_at_rist','<span class="help-block">:message</span>') !!}
</div>


<!-- Treated Field -->
<div class="form-group col-sm-6 {{ $errors->has('treated') ? 'has-error' :'' }}">
    {!! Form::label('treated', 'Treated:') !!}
    {!! Form::text('treated', null, ['class' => 'form-control']) !!}
    {!! $errors->first('treated','<span class="help-block">:message</span>') !!}
</div>


<!-- Destroyed Field -->
<div class="form-group col-sm-6 {{ $errors->has('destroyed') ? 'has-error' :'' }}">
    {!! Form::label('destroyed', 'Destroyed:') !!}
    {!! Form::text('destroyed', null, ['class' => 'form-control']) !!}
    {!! $errors->first('destroyed','<span class="help-block">:message</span>') !!}
</div>


<!-- Slaughtered Field -->
<div class="form-group col-sm-6 {{ $errors->has('slaughtered') ? 'has-error' :'' }}">
    {!! Form::label('slaughtered', 'Slaughtered:') !!}
    {!! Form::text('slaughtered', null, ['class' => 'form-control']) !!}
    {!! $errors->first('slaughtered','<span class="help-block">:message</span>') !!}
</div>


<!-- Vaccinated Field -->
<div class="form-group col-sm-6 {{ $errors->has('vaccinated') ? 'has-error' :'' }}">
    {!! Form::label('vaccinated', 'Vaccinated:') !!}
    {!! Form::text('vaccinated', null, ['class' => 'form-control']) !!}
    {!! $errors->first('vaccinated','<span class="help-block">:message</span>') !!}
</div>


<!-- Lat Field -->
<div class="form-group col-sm-6 {{ $errors->has('lat') ? 'has-error' :'' }}">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::number('lat', null, ['class' => 'form-control']) !!}
    {!! $errors->first('lat','<span class="help-block">:message</span>') !!}
</div>


<!-- Long Field -->
<div class="form-group col-sm-6 {{ $errors->has('long') ? 'has-error' :'' }}">
    {!! Form::label('long', 'Long:') !!}
    {!! Form::number('long', null, ['class' => 'form-control']) !!}
    {!! $errors->first('long','<span class="help-block">:message</span>') !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6 {{ $errors->has('status') ? 'has-error' :'' }}">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('animalSurveillances.index') !!}" class="btn btn-default">Cancel</a>
</div>
