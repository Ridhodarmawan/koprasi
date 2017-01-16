@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row">

   <div class="col-md-12">
    

   <!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <div class="panel-heading">
      <h2 class="panel-title">Tambah satuan</h2>
     </div>
    </div>
    <div class="card-block"> 
 {!! Form::open(['url'=> route('satuans.store'),'method'=> 'post','class'=>'form-horizontal']) !!}
     @include('satuans._form')
     {!! Form::close() !!}
    </div>
</div>
<!--/.Panel-->

   </div>
  </div>
 </div>
@endsection

