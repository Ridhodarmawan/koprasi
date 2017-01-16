@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <div class="panel-heading">
					 <center><h3><i class="fa fa-bars" aria-hidden="true"></i> <b>Data Petugas</b></h3></center>
				</div>
    </div>
    <div class="card-block">
       <div class="panel panel-default">
				

				<div class="panel-body">
				<p> <a class="btn btn-primary" href="{{ route('anggotas.create') }}"> <i class="fa fa-plus prefix"></i>&nbsp;<b>Tambah</b></a></p>
					{!! $html->table(['class'=>'table table-striped']) !!}
				</div>
			</div>

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
