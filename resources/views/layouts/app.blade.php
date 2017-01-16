<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/mdb.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">

    <link rel="stylesheet" href="{{ asset('css/selectize.bootstrap3.css') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    
     <style>
        body {
            background: url("foto/koprasi.JPG")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding-top: 9%
        }
    </style>
</head>
<body class="fixed-sn green-skin"> 
 <!--Double Navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed custom-scrollbar">

            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light sn-avatar-wrapper">
                    <a href="#">
                        <img src="foto/images.jpg">
                    </a>
                </div>
            </li>
            <!--/. Logo -->

            <!--About-->
            <li>
                <div class="about">
                    <p>Quae ad, vel pariatur non voluptates nam quaerat.</p>
                </div>
            </li>
            <!--/.About-->

            <!--Social-->
            <li>
                <ul class="social">
                    <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                    <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                    <li><a class="icons-sm drib-ic"><i class="fa fa-dribbble"> </i></a></li>
                    <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a></li>
                    <li><a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a></li>
                </ul>
            </li>
            <!--/Social-->
            @if (Auth::check())
            <!-- Side navigation links -->
            @role('admin')
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-bus"></i> Master Data<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('anggotas.index') }}">Data petugas</a>
                                </li>
                                <li><a href="{{ route('satuans.index') }}">Setting Satuan</a>
                                </li>
                                <li><a href="{{ route('barangs.index') }}">Barang</a>
                                </li>
                                <li><a href="{{ route('penjualans.index') }}">Penjualan</a>
                                </li>
                                @endrole
                            </ul>
                        </div>
                    </li>
                   
                </ul>
            </li>
            <!--/. Side navigation links -->
                 @endif
        </ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn">
                <p>{{ config('app.name', 'Laravel') }}</p>
            </div>

            @if (Auth::check())
            <ul class="nav navbar-nav float-xs-right">

                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Dashboard</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
                    <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                       <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </div>
                </li>
            </ul>
            @endif
        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double Navigation-->



         @include('layouts._flash')
        @yield('content')

    <!-- Scripts -->
<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>

<script src="{{ asset('js/tether.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/mdb.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/selectize.js') }}"></script>

<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

 <script>
        $(".button-collapse").sideNav();

        var el = document.querySelector('.custom-scrollbar');

        Ps.initialize(el);
    </script>

<script type="text/javascript">
    $('.datepicker').pickadate();
</script>

<script type="text/javascript">
$("#barang").change(function(){


    var barang = $('#barang').val();

           $.post('{{ url('/ajax') }}',
        {
            '_token': $('meta[name=csrf-token]').attr('content'),
            barang:barang },function(data){

                  $("#harga_barang").val(data);
         

        });
             $.post('{{ url('/stok') }}',
        {
            '_token': $('meta[name=csrf-token]').attr('content'),
            stok:barang },function(data){

                  $("#pivot").val(data);
         

        });


}); 
</script>
<script type="text/javascript">

            $('#jumlah_beli').change(function(){

                var harga = $("#harga_barang").val();
                var jumlah = $("#jumlah_beli").val();

                var total = parseInt(harga,10) * parseInt(jumlah,10);

                $("#sub_total").val(total);
            });
</script>




<script type="text/javascript">
    $(document).ready(function(){
        var beli = $("#jumlah_beli").val();
        var stok = $("#pivot").val();

        $("#jumlah_beli").blur(function(){
            if (beli > stok) {
                alert("Stok nya kurang oy");
            }
        });
    });
</script>


   
@yield('scripts')
</body>
</html>
