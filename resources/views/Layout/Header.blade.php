<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i
									class="icofont-support-faq mr-2"></i>support-medical@gmail.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Damascus, Syria
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890">
							<span>Call Now : </span>
							<span class="h4">963-997-035-076</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="{{route('index')}}">
				<img src="{{asset('images/mylogo.png')}}" alt="" class="mylogo">
				<b> <span class="logo-font">Medical Emergency System</span></b>
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="{{route('index')}}">Emergency Status</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('StatusController.profile')}}">Profile</a>
					</li>
					<li class="nav-item"><a class="nav-link"
							href="{{route('StatusController.emergencyNumbers')}}">Emergency Num</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('StatusController.contact')}}">Contact</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('StatusController.about')}}">About</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('StatusController.register')}}">Register</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="{{route('logout')}}">logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>