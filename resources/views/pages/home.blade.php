@extends('layouts.app')

@section('pageName')
	Welcome
@stop

@section('content')

	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	    <!-- Intro Header -->
	    <header class="intro">
	        <div class="intro-body">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12" style="margin-top:15%;">
	                        <h1 class="brand-heading">Lynn's Softball</h1>
	                        <p class="intro-text">Adult softball league located in Albany, NY.</p>
	                        <a href="#about" class="btn btn-circle page-scroll">
	                            <i class="fa fa-angle-double-down animated"></i>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </header>

	    <!-- About Section -->
	    <section id="about" class="container content-section text-center">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2">
	                <h2>About Lynn's Softball</h2>
	                <p>The league offers several divisions of play.</p>
	            </div>
	        </div>
	    </section>

	    <!-- Download Section -->
	    <section id="download" class="content-section text-center">
	        <div class="download-section">
	            <div class="container-fluid">
	                <div class="col-lg-10 col-lg-offset-1">
	                    <h2>Sponsors</h2>
	                    <br/>
	                    <div class="owl-carousel owl-theme owl-loaded owl-drag">
						    <div class="item"><img src='build/img/sponsers/Banner-518Realty.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-AlbanyCrossFit.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-AnacondaSports.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-AngioDynamics.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-BellaNapoli.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-Bootleggers.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-B-radsBistro.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-CafeHollywood.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-ClearViewBag.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-CommerceHub.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-DaveBusters.jpeg'/></div>
						    <div class="item"><img src='build/img/sponsers/Banner-DeathWishCoffee.jpeg'/></div>
						</div>
	                </div>
	            </div>
	        </div>
	    </section>

	    <!-- Contact Section -->
	    <section id="contact" class="container content-section text-center">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2">
	                <h2>Contact Us</h2>
	                <p>Feel free to email me to provide some feedback.</p>
	                <p><a href="mailto:feedback@robertdesarbo.com">robertdesarbo@gmail.com</a>
	                </p>
	                <ul class="list-inline banner-social-buttons">
	                    <li>
	                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
	                    </li>
	                    <li>
	                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </section>

	    <!-- Map Section -->
	    <div id="map"></div>

	    <!-- Footer -->
	    <footer>
	        <div class="container text-center">
	            <p>Copyright &copy; Lynn's Softball 2016</p>
	        </div>
	    </footer>

	    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
	    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

	</body>

@stop

@section('scripts')
	<script>
		$( document ).ready(function() 
		{
		    // jQuery to collapse the navbar on scroll
			function collapseNavbar() {
			    if ($(".navbar").offset().top > 50) {
			        $(".navbar-fixed-top").addClass("top-nav-collapse");
			    } else {
			        $(".navbar-fixed-top").removeClass("top-nav-collapse");
			    }
			}

			$('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:10,
			    nav:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			})

			$(window).scroll(collapseNavbar);
			collapseNavbar
		});


	</script>


@stop