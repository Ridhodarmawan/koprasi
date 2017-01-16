@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="text-xs-center">
            <center><h3> Reset password</h3></center>
            <hr class="mt-2 mb-2">
        </div>
 <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

{!! Form::open(['url'=>'/password/email/','class'=>'form-horizontal'])!!}

<div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
<i class="fa fa-envelope prefix"></i>

{!! Form::email('email', null , ['class'=>'form-control']) !!}
{!! $errors->first('email', '<p class="help-block">message</p>') !!}
{!! Form::label('email', 'Your email') !!}
</div>
</div>

<div class="form-group">
    <center><button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-envelope"></i> Kirim Link Reset Password
    </button></center>
</div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
