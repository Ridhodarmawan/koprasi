<div class="md-form{{ $errors->has('nama') ? ' has-error' : '' }}">
	
	<i class="fa fa-user prefix"></i>
		{!! Form::text('nama', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
		{!! Form::label('nama', 'Nama') !!}
	</div>

<div class="md-form{{ $errors->has('alamat') ? ' has-error' : '' }}">
	 <i class="fa fa-pencil prefix"></i>
	
		{!! Form::textarea('alamat', null, ['class="md-textarea"'=>'form-control']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
		{!! Form::label('alamat', 'Alamat') !!}
	</div>


<div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
	
<i class="fa fa-envelope prefix"></i>
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
		{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
		{!! Form::label('email', 'Email') !!}
	</div>


<div class="md-form{{ $errors->has('jabatan') ? ' has-error' : '' }}">
	<i class="fa fa-database prefix"></i>
	
		{!! Form::text('jabatan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
		{!! Form::label('jabatan', 'Jabatan') !!}
	</div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>