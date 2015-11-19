@extends('master_template')

@section('title')
Index
@stop

@section('content')

	<h1>{{ $title }}</h1> 
  <div class="jumbotron">
	<h2>
	<small>Welcome to the Princess Cruises portal.</small>
	</h2>
  </div>

	<div class="page-header">
        <h1>Current Hot Deals</h1>
	</div>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
          	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          	<div class="item active">
            	<img class="img-responsive center-block" src="laravel-logo.png" alt="First slide">
          	</div>
          	<div class="item">
            	<img class="img-responsive center-block" src="laravel-logo.png" alt="Second slide">
          	</div>
          	<div class="item">
            	<img class="img-responsive center-block" src="laravel-logo.png" alt="Third slide">
          	</div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          	<span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          	<span class="sr-only">Next</span>
        </a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
@stop

@section('footer')

	<h6><small>Copyright Princess Cruises 2015.</small></h6>
@stop