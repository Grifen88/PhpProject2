<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>

        <!-- Bootstrap -->
        <link href="{!! URL::asset('css/add.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/bootstrap.min.css') !!}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{!! URL::asset('js/jquery-1.11.3.js') !!}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
    </head>
        
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Princess Cruises</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">{!! link_to_action('MainController@main', 'Home') !!}</li>
                        <li>{!! link_to_action('MainController@search', 'Search') !!}</li>
                        <li>{!! link_to_action('CruiseController@index', 'Cruises') !!}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservations <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_action('ReservationController@index', 'View Existing Reservations') !!}</li>
                                <li>{!! link_to_action('ReservationController@create', 'Create New Reservations') !!}</li>
                                <li>{!! link_to_action('ReservationController@update', 'Update Existing Reservations') !!}</li>
                            </ul>
                        </li>
                    </ul>
                    @if (\Auth::User())
                        <span class="nav-text navbar-right" style="color:beige;">
                        <p class="nav-text navbar-right" style="color:white; padding-left:20px;">Welcome, {{ \Auth::User()->name }}!</p>
                        <a href="{{ url('auth/logout') }}">Logout</a>    
                        </span>
                    @else
                        <span class="nav-text navbar-right" style="color:beige;">
                        <p class="nav-text navbar-right" style="color:white; padding-left:20px;">Welcome, Guest!</p>
                        <a href="{{ url('auth/login') }}">Login</a>   
                        </span>
                    @endif
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" id="contentmain" role="main">
            <div class="row">
                @yield('content')                 
            </div>
            <div class="row">
                @yield('footer')
            </div>
        </div>
     </body>
</html>