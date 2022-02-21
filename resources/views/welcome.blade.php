
<!DOCTYPE html>
<html lang="en">

  <head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<title>Water Billing System</title>

	<!-- Additional CSS Files -->
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/font-awesome.css') }}">

	<link rel="stylesheet" href="{{ secure_asset('css/templatemo-training-studio.css') }}">

	</head>

	<body>

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<a href="/" class="logo"><em>Water</em> Billing <em>System</em></a>
						<!-- ***** Logo End ***** -->
						<!-- ***** Menu Start ***** -->
						<ul class="nav">
							<li class="scroll-to-section"><a href="{{ route('home') }}" class="active">Home</a></li>
							<li class="scroll-to-section"><a href="#features">About</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Contact</a></li>
                            @guest
                            <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
                            <li class="main-button"><a href="{{ route('register') }}">Register</a></li>
                            @endguest
                            @auth
							<li class="main-button"><a href="{{ route('register') }}">Logout</a></li>
                            @endauth
						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="https://ak.picdn.net/shutterstock/videos/33919840/preview/stock-footage-counter-flow-of-cold-water-black-color.webm" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>works anywhere, anytime</h6>
                <h2>Keep track of your <em>water consumption</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="/register">Get Started Today</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

	<!-- ***** Features Item Start ***** -->
	<section class="section" id="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="section-heading">
						<h2>About <em>Us</em></h2>
						<img src="{{ secure_asset('images/line-dec.png') }}" alt="waves">
						<p>We provide an interface which helps you keep track of you water consumption, while allowing you to pay bills progressively anytime, anywhere.</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="features-items">
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/tap.png') }}" alt="First One">
							</div>
							<div class="right-content">
								<h4>Monitor your consumption</h4>
								<p>with online access, you can monitor your consumption from anywhere.</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/pay.png') }}" alt="second one">
							</div>
							<div class="right-content">
								<h4>Pay bills</h4>
								<p>payment is done through mobile money, banking or cash...</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/analytics.png') }}" alt="third gym training">
							</div>
							<div class="right-content">
								<h4>Quick analytics</h4>
								<p>Interactive charts provide an intuitive insight.</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="features-items">
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/bell.png') }}" alt="fourth muscle">
							</div>
							<div class="right-content">
								<h4>Get notifications</h4>
								<p>Whenever your bills are due, or a new bill is added - no delays.</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/form.png') }}" alt="training fifth">
							</div>
							<div class="right-content">
								<h4>Update your information</h4>
								<p>Whenever you change equipment or your place of residence.</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
						<li class="feature-item">
							<div class="left-icon">
								<img src="{{ secure_asset('images/bubble.png') }}" alt="gym training">
							</div>
							<div class="right-content">
								<h4>...Much more to come</h4>
								<p>We intended to implement more features and keep improving user experience</p>
								<a href="#" class="text-button">Discover More</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    <!-- ***** Features Item End ***** -->

	<!-- ***** Contact Us Area Starts ***** -->
	<section class="section" id="contact-us">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div id="map">
					  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15950.003100847824!2d30.124284799999998!3d-1.9529727999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srw!4v1645187325272!5m2!1sen!2srw" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="contact-form">
						<form id="contact" action="" method="post">
						  <div class="row">
							<div class="col-md-6 col-sm-12">
							  <fieldset>
								<input name="name" type="text" id="name" placeholder="Your Name*" required="">
							  </fieldset>
							</div>
							<div class="col-md-6 col-sm-12">
							  <fieldset>
								<input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
							  </fieldset>
							</div>
							<div class="col-md-12 col-sm-12">
							  <fieldset>
								<input name="subject" type="text" id="subject" placeholder="Subject">
							  </fieldset>
							</div>
							<div class="col-lg-12">
							  <fieldset>
								<textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
							  </fieldset>
							</div>
							<div class="col-lg-12">
							  <fieldset>
								<button type="submit" id="form-submit" class="main-button">Send Message</button>
							  </fieldset>
							</div>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ***** Contact Us Area Ends ***** -->

	<!-- ***** Footer Start ***** -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>
						{{ date('Y') }} Water Billing System <br>
						<a rel="nofollow noreferrer noopener" href="https://templatemo.com" class="tm-text-link text-white" target="_blank">
                            Theme by TemplateMo
                        </a>
					</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="{{ secure_asset('js/jquery-2.1.0.min.js') }}"></script>

	<!-- Bootstrap -->
	<script src="{{ secure_asset('js/popper.js') }}"></script>
	<script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>

	<!-- Plugins -->
	<script src="{{ secure_asset('js/scrollreveal.min.js') }}"></script>
	<script src="{{ secure_asset('js/waypoints.min.js') }}"></script>
	<script src="{{ secure_asset('js/jquery.counterup.min.js') }}"></script>
	<script src="{{ secure_asset('js/imgfix.min.js') }}"></script>
	<script src="{{ secure_asset('js/mixitup.js') }}"></script>
	<script src="{{ secure_asset('js/accordions.js') }}"></script>

	<!-- Global Init -->
	<script src="{{ secure_asset('js/custom.js') }}"></script>

  </body>
</html>
