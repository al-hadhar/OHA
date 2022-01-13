<!-- Type Field -->
<div class="form-group col-sm-6 {{ $errors->has('type') ? 'has-error' :'' }}">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::number('type', null, ['class' => 'form-control']) !!}
    {!! $errors->first('type','<span class="help-block">:message</span>') !!}
</div>


<!-- File Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('file_name') ? 'has-error' :'' }}">
    {!! Form::label('file_name', 'File Name:') !!}
    {!! Form::text('file_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('file_name','<span class="help-block">:message</span>') !!}
</div>


<!-- File Path Field -->
<div class="form-group col-sm-6 {{ $errors->has('file_path') ? 'has-error' :'' }}">
    {!! Form::label('file_path', 'File Path:') !!}
    {!! Form::text('file_path', null, ['class' => 'form-control']) !!}
    {!! $errors->first('file_path','<span class="help-block">:message</span>') !!}
</div>


<!-- Total Success Field -->
<div class="form-group col-sm-6 {{ $errors->has('total_success') ? 'has-error' :'' }}">
    {!! Form::label('total_success', 'Total Success:') !!}
    {!! Form::number('total_success', null, ['class' => 'form-control']) !!}
    {!! $errors->first('total_success','<span class="help-block">:message</span>') !!}
</div>


<!-- Total Failed Field -->
<div class="form-group col-sm-6 {{ $errors->has('total_failed') ? 'has-error' :'' }}">
    {!! Form::label('total_failed', 'Total Failed:') !!}
    {!! Form::number('total_failed', null, ['class' => 'form-control']) !!}
    {!! $errors->first('total_failed','<span class="help-block">:message</span>') !!}
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
    <a href="{!! route('uploadHeaders.index') !!}" class="btn btn-default">Cancel</a>
</div>
