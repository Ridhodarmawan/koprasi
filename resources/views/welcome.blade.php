<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
          <!-- Styles -->
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/mdb.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">

    <link rel="stylesheet" href="{{ asset('css/selectize.bootstrap3.css') }}">
    <!-- Scripts -->

   
  
   
    

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                   
                   
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Aplikasi Koperasi Sekolah
                    <hr>
                </div>

                <div class="links">
                      <a href="{{ url('/login') }}" class="btn btn-primary btn-rounded btn-lg">Login</a>
                      <a href="{{ url('/register') }}" class="btn btn-success btn-rounded btn-lg">Register</a>  
                </div>
            </div>
        </div>
<script type="text/javascript" src="{{asset('js/jquery-2.2.3.min.js')}}"></script>

<script src="{{ asset('js/tether.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/mdb.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

    </body>
</html>
