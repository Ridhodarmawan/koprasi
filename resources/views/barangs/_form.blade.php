<div class="md-form{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
<i class="fa fa-cube prefix"></i>
	
		{!! Form::text('nama_barang', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
		{!! Form::label('nama_barang', 'Nama Barang') !!}

	</div>

<div class="md-form{{ $errors->has('kode_barang') ? ' has-error' : '' }}">
<i class="fa fa-tag prefix"></i>
	
		{!! Form::text('kode_barang', null, ['class'=>'form-control']) !!}
		{!! $errors->first('kode_barang', '<p class="help-block">:message</p>') !!}
		{!! Form::label('kode_barang', 'Kode Barang') !!}
	</div>


<div class="md-form{{ $errors->has('harga_barang') ? ' has-error' : '' }}">
	<i class="fa fa-usd prefix	"></i>
		{!! Form::text('harga_barang', null, ['class'=>'form-control']) !!}
		{!! $errors->first('harga_barang', '<p class="help-block">:message</p>') !!}
		{!! Form::label('harga_barang', 'Harga Barang') !!}
	</div>

<div class="md-form{{ $errors->has('stok_barang') ? ' has-error' : '' }}">
	<i class="fa fa-th-list prefix"></i>
		{!! Form::number('stok_barang', null, ['class'=>'form-control','min'=>1]) !!}
		{!! $errors->first('stok_barang', '<p class="help-block">:message</p>') !!}
		{!! Form::label('stok_barang', 'Stok Barang') !!}
	</div>
 

<div class="md-form{{ $errors->has('satuan') ? ' has-error':'' }}">
  
    {!! Form::select('satuan', [''=>'']+App\Satuan::pluck('nama_satuan','id')->all(), null, [
      'class'=>'js-selectize',
      'placeholder' => 'Pilih Satuan'
      ]) !!}
    {!! $errors->first('satuan', '<p class="help-block">:message</p>') !!}

  
  </div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>