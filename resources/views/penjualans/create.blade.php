@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row">

   <div class="col-md-12">
   
<!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <h2 class="panel-title">Tambah Penjualan</h2>
    </div>
    <div class="card-block">
        {!! Form::open(['url'=> route('penjualans.store'),'method'=> 'post','class'=>'form-horizontal']) !!}
     @include('penjualans._form')
     {!! Form::close() !!}
    </div>
</div>
<!--/.Panel-->
   
   </div>
  </div>
 </div>
@endsection