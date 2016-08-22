<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">

		<title>@yield('pageName')</title>

		<link rel="stylesheet" href="{{ elixir('css/styles.css') }}">
		
	</head>

	<body>

	    <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="/">Lynn's Softball League</a>
	        </div>
	            <!-- Right Side Of Navbar -->
	            <ul class="nav navbar-nav navbar-right">
	                <!-- Authentication Links -->
	                @if (Auth::guest())
	                    <li><a href="{{ url('/login') }}">Login</a></li>
	                    <li><a href="{{ url('/register') }}">Register</a></li>
	                @else
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                            {{ Auth::user()->name }} <span class="caret"></span>
	                        </a>

	                        <ul class="dropdown-menu" role="menu">
	                        	<li><a href="{{ url('/setting') }}"><i class="fa fa-cog"></i> Settings</a></li>
	                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
	                        </ul>
	                    </li>
	                @endif
	            </ul>
	      </div>
	    </nav>
				
	    <div class="container main-content">
	      <div class="row row-offcanvas row-offcanvas-left">

	        <!-- sidebar -->
	        <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 sidebar-offcanvas " role="navigation">
	            <ul class="nav">
	            	@if (Auth::check())
	            	  <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
		              <li><a href="{{ url('/schedule') }}"><i class="fa fa-list"></i> Schedule</a></li>
		              <li><a href="{{ url('/players') }}"><i class="fa fa-user"></i> Players</a></li>
		              <li><a href="{{ url('/teams') }}"><i class="fa fa-users"></i> Teams</a></li>
		              <li><a href="{{ url('/leagues') }}"><i class="fa fa-trophy"></i> Leagues</a></li>
		              <li><a href="{{ url('/fields') }}"><i class="fa fa-map-marker"></i> Fields</a></li>
		              <li><a href="{{ url('/umpires') }}"><i class="fa fa-gavel"></i> Umpires</a></li>  
		            @endif   
	            </ul>
	        </div>

			<div class="col-xs-8 col-sm-8 col-md-10 col-lg-10 container">
				@yield('content')
			</div>
	      </div><!--/.row-->
	    </div><!--/.container-->

		
		@yield('footer')

		<script src="{{ elixir('js/frontend.js') }}"></script>
	</body>

</html>