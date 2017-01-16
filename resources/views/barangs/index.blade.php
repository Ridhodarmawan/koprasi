@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <h2 class="panel-title">Barang</h2>
    </div>
    <div class="card-block">
        <p> <a class="btn btn-primary" href="{{ route('barangs.create') }}"><i class="fa fa-plus prefix"></i>&nbsp;<b>Tambah</b></a></p>
					{!! $html->table(['class'=>'table table-striped']) !!}
    </div>
</div>
<!--/.Panel-->

		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
