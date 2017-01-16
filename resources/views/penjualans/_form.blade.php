<div class="md-form{{ $errors->has('nama_pelanggan') ? ' has-error' : '' }}">
	
	
		{!! Form::text('nama_pelanggan', null, ['class'=>'form-control', 'min'=>1]) !!}
		{!! $errors->first('nama_pelanggan', '<p class="help-block">:message</p>') !!}
		{!! Form::label('nama_pelanggan', 'Nama Pelanggan') !!}
	</div>
 

<div class="md-form{{ $errors->has('id_barang') ? ' has-error':'' }}">
 
 
    {!! Form::select('id_barang', [''=>'']+App\Barang::pluck('nama_barang','id')->all(), null, [
    	'id'=>'barang',
      'class'=>'js-selectize',
      'placeholder' => 'pilih Barang'
      ]) !!}
    {!! $errors->first('id_barang', '<p class="help-block">:message</p>') !!}
     {!! Form::label('id_barang', 'Barang') !!}
  </div>


<div class="md-form{{ $errors->has('tanggal') ? ' has-error' : '' }}">
		{!! Form::text('tanggal', null, ['class'=>'form-control datepicker']) !!}
		{!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
		{!! Form::label('tanggal', 'Tanggal Pembelian') !!}
	</div>
	 


<div class="md-form{!! $errors->has('harga_barang') ? ' has-error' : '' !!}">
	

		{!! Form::text('harga_barang', $value=0, [
		'class'=>'form-control',
		'id'=>'harga_barang',
		'readonly'=>''
		]) !!}
		{!! $errors->first('harga_barang', '<p class="help-block">:message</p>') !!}
		{!! Form::label('harga_barang', 'Harga Barang') !!}
	</div>


<div class="md-form{{ $errors->has('jumlah_beli') ? ' has-error' : '' }}">
	
	
		{!! Form::text('jumlah_beli', null, [
		'class'=>'form-control',
		'id'=>'jumlah_beli',
		 'min'=>1]) !!}
		{!! $errors->first('jumlah_beli', '<p class="help-block">:message</p>') !!}
		{!! Form::label('jumlah_beli', 'Jumlah Beli') !!}
	</div>


<div class="md-form{{ $errors->has('sub_total') ? ' has-error' : '' }}">
	
	
		{!! Form::text('sub_total', $value=0, [
		'class'=>'form-control',
		'id'=>'sub_total',
	   'readonly'=>'']) !!}
		{!! $errors->first('sub_total', '<p class="help-block">:message</p>') !!}
		{!! Form::label('sub_total', 'Sub Total') !!}
	</div>


<div class="md-form{!! $errors->has('id_petugas') ? ' has-error' : '' !!}">
	
	
		{!! Form::select('id_petugas', [''=>'']+App\Anggota::pluck('nama','id')->all(), null, [
		'class'=>'js-selectize',
		'placeholder' => 'pilih Petugas'
		]) !!}
		{!! $errors->first('id_petugas', '<p class="help-block">:message</p>') !!}
		{!! Form::label('id_petugas', 'Nama Petugas') !!}
	</div>
<input type="text" id="pivot" name="">
<br><br>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>

