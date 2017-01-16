@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-5">
        <!--Form with header-->
                <div class="card">
                    <div class="card-block">
        <!--Header-->
             <div class="form-header purple darken-4">
                <h3><i class="fa fa-user-plus" aria-hidden="true"></i> Register</h3>
             </div> 
                 {!! Form::open(['url'=>'/register','class'=>'form-horizontal']) !!}
                 <!--Body-->
        <div class="md-form{{ $errors->has('name') ? ' has-error' : ''}}">
                    <i class="fa fa-user prefix"></i>                    
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                         {!! Form::label('name', 'Your name') !!}
                    
        </div>

        <div class="md-form{{ $errors->has('email') ? ' has-error' : ''}}">
                  <i class="fa fa-envelope prefix"></i>
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                         {!! Form::label('password', 'Your email') !!}
                    
        </div>

         <div class="md-form{{ $errors->has('password') ? 'has-error' : '' }}">
                     <i class="fa fa-lock prefix"></i>
                    
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        {!! Form::label('password', 'Password') !!}
        </div>

         <div class="md-form{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <i class="fa fa-key prefix"></i>
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                        {!! Form::label('password_confirmation', 'Konfirmasi Password') !!}    
         </div>


        <div class="text-xs-center">
            <button class="btn btn-deep-purple">Daftar</button>
        </div>
    </div>
                 {!! Form::close() !!}  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</div>
@endsection
