@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/satuans') }}">data Satuan</a></li>
				<li class="active">Ubah Satuan</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Satuan</h2>
				</div>

				<div class="panel-body">
					{!! Form::model($satuan,['url' => route('satuans.update',$satuan->id),
					'method' => 'put', 'class'=>'form-horizontal']) !!}
					@include('satuans._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection