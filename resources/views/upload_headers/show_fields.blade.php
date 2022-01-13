<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $uploadHeader->type }}</p>
</div>


<!-- File Name Field -->
<div class="form-group">
    {!! Form::label('file_name', 'File Name:') !!}
    <p>{{ $uploadHeader->file_name }}</p>
</div>


<!-- File Path Field -->
<div class="form-group">
    {!! Form::label('file_path', 'File Path:') !!}
    <p>{{ $uploadHeader->file_path }}</p>
</div>


<!-- Total Success Field -->
<div class="form-group">
    {!! Form::label('total_success', 'Total Success:') !!}
    <p>{{ $uploadHeader->total_success }}</p>
</div>


<!-- Total Failed Field -->
<div class="form-group">
    {!! Form::label('total_failed', 'Total Failed:') !!}
    <p>{{ $uploadHeader->total_failed }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $uploadHeader->status }}</p>
</div>


