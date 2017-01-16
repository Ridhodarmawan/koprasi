<div class="md-form{{ $errors->has('nama_satuan') ? ' has-error' : '' }}">
	<i class="fa fa-group prefix"></i>

		{!! Form::text('nama_satuan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_satuan', '<p class="help-block">:message</p>') !!}
		{!! Form::label('nama_satuan', 'Nama Satuan') !!}
	</div>
 

<div class="md-form">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
