<?php 
	session_start();
	if (isset($_SESSION['user_id'])) {
		header("Location: dashboard.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EXP - Explore Your Potential</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
		//this function manages which part of the UI to show/hide as needed
		function fixUI() {
			var role = "<?php if (isset($_SESSION['role'])) {echo $_SESSION['role'];}?>";
			var first_name = "<?php if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];}?>";
			var user_id = "<?php if (isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];}?>";

			//making div parts visible as per role's value
			if (role == "") {
				// alert("in condition 1");
				document.getElementById("notSignedIn0").style.display = "block";
				document.getElementById("notSignedIn1").style.display = "block";
				document.getElementById("notSignedIn2").style.display = "block";

				document.getElementById("signedIn1").style.display = "block";
				document.getElementById("signedIn2").style.display = "block";
			}
			else if (role == "1") {
				// alert("in condition 2");
				document.getElementById("signedIn0").style.display = "block";
				document.getElementById("signedIn1").style.display = "block";
				document.getElementById("signedIn2").style.display = "block";
				document.getElementById("signedIn3").style.display = "block";
				document.getElementById("signedIn4").style.display = "block";
				document.getElementById("firstName").innerHTML = first_name+" ";
			}
			else if (role == "2") {
				// alert("in condition 2");
				document.getElementById("signedIn0").style.display = "block";
				document.getElementById("signedIn3").style.display = "block";
				document.getElementById("signedIn4").style.display = "block";
				document.getElementById("firstName").innerHTML = first_name+" ";
			}
		}

	</script>

  </head>
  
  <body onload="fixUI();">

  		<footer class="footer" style="text-align: center; height: 24px; font-size: 12px">
		    <div class="container-fluid px-lg-5" style="display: flex; justify-content: space-between;">
		    	
		    	<span><a href="expertRegistration.html" style="text-decoration: none; color: #ddd">Apply for counselling expert</a>&nbsp;/&nbsp;<a href="expertSignIn.html" style="text-decoration: none; color: #ddd">Login as counselling expert</a></span>
			    <span><a href="adminLogin.html" style="text-decoration: none; color: #ddd";>Login as admin</a></span>
		    </div>
		</footer>

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.php" style="font-size: 28px; margin-left: -5%; color: #195CA4; padding-right: 5%;">
		    	EXP<span style="color: #ccc;">LORE<span style="color: #ccc; font-size: 16px">YOUR</span>POTENTIAL</span>
	            <!-- <img src="images/exp-logo3.png" height="100px" width="300px" style=" margin-left: -20%"> -->
        	</a>
	    	
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li id="notSignedIn0" class="nav-item active" style="display: none;"><a href="index.php" class="nav-link">Home</a></li>
	        	<li id="signedIn0" class="nav-item active" style="display: none;"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
				<!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->	       	
				<li id="signedIn1" class="nav-item" style="display: none;"><a href="assessment.php" class="nav-link">Assessment Test</a></li>
	          	<li id="signedIn2" class="nav-item" style="display: none;"><a href="counselling.php" class="nav-link">Counselling</a></li>
		        
		        <!-- <div id="notSignedIn" style="display: block;"> -->
		        	<li id="notSignedIn1" class="nav-item" style="display: none;"><a href="signin.html" class="nav-link">Sign-In</a></li>
		        	<li id="notSignedIn2" class="nav-item" style="display: none;"><a href="register.html" class="nav-link">Register</a></li>
		        <!-- </div> -->
		        
		        <!-- <div id="signedIn"  style="display: block;"> -->
		        	<li id="signedIn3" class="nav-item" style="display: none; padding-right: 2%;"><a href="account.php" class="nav-link">Account</a></li>
		        	<li id="signedIn4" class="nav-item" style="display: none; padding-top: 4%;"><a href="logout.php"><span id="firstName">User</span>(logout)</a></li>
		        <!-- </div> -->
		        
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>We are your personal life coach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Discover the secrets of life</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Improving the world</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Choose your career to be successful</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/bg_3.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Welcome to lifecoach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">We help to reach your goals</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>


	  <footer class="footer" style="text-align: center; padding: 8% 0%;">
			<div class="container-fluid px-lg-5">
				<!-- <div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4"> -->
								<h2 class="footer-heading">About us</h2>
								<p style="margin: 2% 20%; padding-bottom: 2%">
                    The career-guidance is one of the bridges between the professional-market and the educational sphere. This abstract is based on the  methods of the career-guidance among the students at the beginning and at the end of their educational period during the entire period of study with the taking into account the requirements of students professional skills which should be possessed by future graduates;  how career guidance helps students understand the social significance and the content of their chosen profession during the educational period and how this understanding contributes to the students' motivation to the acquisition professional skills; will the enough of those professional skills that students gain in the university for to meets the needs of the  market or they needs to obtain for additional professional skills.
                </p>
							<!-- </div> -->
						
						<!-- 	</div>
						</div>
					</div>
				</div> -->
			</div>
		</footer>


	  <!-- TEAM INFO STARTS-->
	  <div class="hero-wrap">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/image_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
	          	<img src="images/staff-3.jpg" style="position: absolute; height: 350px; width: 350px; opacity: 0.9; border-radius: 50%">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>We are your personal life coach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Meet the team that makes this possible</h1>
			            <p style="position: relative; opacity: 0.7"><a href="#" class="btn btn-white">Paarth Manhas</a></p>

		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
	          	<img src="images/staff-4.jpg" style="position: absolute; height: 350px; width: 350px; opacity: 0.9; border-radius: 50%">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Improving the world</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Meet the team that makes this possible</h1>
			            <p style="position: relative; opacity: 0.7"><a href="#" class="btn btn-white">Rahul Kumar</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
	          	<img src="images/staff-5.jpg" style="position: absolute; height: 350px; width: 350px; opacity: 0.9; border-radius: 50%">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Welcome to lifecoach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Meet the team that makes this possible</h1>
			            <p style="position: relative; opacity: 0.7"><a href="#" class="btn btn-white">Mantisha Singhal</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
	          	<img src="images/staff-6.jpg" style="position: absolute; height: 350px; width: 350px; opacity: 0.9; border-radius: 50%">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Welcome to lifecoach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Meet the team that makes this possible</h1>
			            <p style="position: relative; opacity: 0.7"><a href="#" class="btn btn-white">Rajneesh Kapoor</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!-- TEAM INFO ENDS -->


    <footer class="footer" style="text-align: center; padding-top: 3%;">
			<div class="container-fluid px-lg-5">
				<!-- <div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4"> -->
					
							<!-- </div> -->
							
							<!-- </div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12"> -->
								<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
					  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<!-- 	</div>
						</div>
					</div>
				</div> -->
			</div>
		</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>
