@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/penjualans') }}">data penjualan</a></li>
				<li class="active">Ubah Penjualan</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Penjualan</h2>
				</div>

				<div class="panel-body">
					{!! Form::model($penjualan,['url' => route('penjualans.update',$penjualan->id),
					'method' => 'put', 'class'=>'form-horizontal']) !!}
					@include('penjualans._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection