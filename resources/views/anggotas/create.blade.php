@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row">

   <div class="col-md-12">
   
<!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <div class="panel-heading">
      <center><h3><i class="fa fa-user-plus" aria-hidden="true"></i><b> Tambah Anggota</b></h3></center>  
     </div>
    </div>
    <div class="card-block">
        
 <div class="panel-body">
     {!! Form::open(['url'=> route('anggotas.store'),'method'=> 'post','class'=>'form-horizontal']) !!}
     @include('anggotas._form')
     {!! Form::close() !!}
     </div>

    </div>
</div>
<!--/.Panel-->

   

   </div>
  </div>
 </div>
@endsection

