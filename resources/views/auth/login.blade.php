@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            
<!--Form with header-->
<div class="card">
    <div class="card-block">

        <!--Header-->
        <div class="form-header purple darken-4">
            <h3><i class="fa fa-lock"></i> Login:</h3>
        </div>

        <!--Body-->
        {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}
                <div class="md-form{{ $errors->has('email') ? ' has-error' : ''}}">
                    <i class="fa fa-envelope prefix"></i>
                    
                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        {!! Form::label('email', 'Your email') !!}
                    
                </div>


        <div class="md-form{{ $errors->has('password') ? ' has-error' : ''}}">
                  <i class="fa fa-key prefix"></i>
                   
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                         {!! Form::label('password', 'Your password') !!}
                    
                </div>

        <div class="text-xs-center">
            <button class="btn btn-deep-purple">Login</button>
        </div>

    </div>

    <!--Footer-->
     <div class="modal-footer">
        <div class="options">
            <p>Bukan
             anggota? <a href="{{ url('/register') }}">Daftar</a></p>
            <p>Lupa <a href="{{ url('/password/reset') }}"> kata sandi?
</a></p>
        </div>
    </div>
{!! Form::close() !!}
</div>
<!--/Form with header-->

        </div>
        <div class="col-md-4"></div>

    </div>
</div>

@endsection 

