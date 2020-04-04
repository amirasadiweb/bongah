<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    {{--<link rel="stylesheet" href="/css/bootstrap.css" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/bootstrap-rtl.css" />
    <link rel="stylesheet" href="/css/style.css" />

    {{--sweet_alert--}}
    <link rel="stylesheet" href="/css/sweet_alert/sweet.css" />
    {{--sweet_alert--}}


    {{--dropzoine--}}
    <link rel="stylesheet" href="/css/dropzoine/dropzoine.css" />
    {{--dropzoine--}}

    {{--lity--}}
    <link rel="stylesheet" href="/css/lity/lity.css" />

    {{--lity--}}


    @yield('head')

</head>
<body>


<nav class="navbar navbar-inverse navbar-static-top">



    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                صفحه اصلی
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->



            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest() || Auth::user()->verified==0)
                    <li><a href="{{ url('/login') }}">ورد به سیستم</a></li>
                    <li><a href="{{ url('/register') }}">ثبت نام</a></li>
                @else

                    @if(Auth::user()->verified==1)
                        <li><a href="{{ url('banners/create') }}">ساخت آگهی</a></li>

                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                        {{ Auth::user()->name }}


                                        <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>خروج</a></li>
                                </ul>
                            </li>
                    @endif

                @endif
            </ul>
        </div>
    </div>
</nav>

<h2>{{time()}}</h2>


<section class="container" id="pjax-container">

  @yield('content')

</section>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
{{--<script src="/css/dropzoine/dropzoine.js"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.js"></script>

{{--<script>--}}
    {{--$(document).pjax('.navbar a','#pjax-container');--}}
{{--</script>--}}
@include('flash');

<script src="/css/lity/lity.js"></script>



</body>
</html>
