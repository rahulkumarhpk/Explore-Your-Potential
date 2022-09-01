<?php 
	session_start();
	include 'database.php';
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

    <script type="text/javascript">		//this function manages which part of the UI to show/hide as needed
		function fixUI() {

			var role = "<?php if (isset($_SESSION['role'])) {echo $_SESSION['role'];}?>";
			var first_name = "<?php if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];}?>";
			var user_id = "<?php if (isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];}?>";
			var bio = "<?php if (isset($_SESSION['bio'])) {echo $_SESSION['bio'];}?>";
			var bioText = "<?php if (isset($_SESSION['bioText'])) {echo $_SESSION['bioText'];}?>";

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
				document.getElementById("studentDashboard").style.display = "block";
				document.getElementById("firstName").innerHTML = first_name+" ";
				document.getElementById("studentName").innerHTML = first_name;
				document.getElementById("studentName2").innerHTML = first_name.toUpperCase();

				
			}
			else if (role == "2") {
				// alert("in condition 2");
				document.getElementById("signedIn0").style.display = "block";
				document.getElementById("signedIn3").style.display = "block";
				document.getElementById("signedIn4").style.display = "block";
				document.getElementById("parentDashboard").style.display = "block";
				document.getElementById("firstName").innerHTML = first_name+" ";
				document.getElementById("parentName").innerHTML = first_name.toUpperCase();


			}

			if (bio=="1") {
				// alert("1");
				document.getElementById("filledBio").style.display = "block";
				document.getElementById("bioView").innerHTML = bioText;
			}
			else if (bio=="2") {
				// alert("2");
				document.getElementById("fillBio").style.display = "block";
			}
		}

		function makeEditable() {
			var bioText = "<?php if (isset($_SESSION['bioText'])) {echo $_SESSION['bioText'];}?>";
			document.getElementById("filledBio").style.display = "none";
			document.getElementById("editBio").style.display = "block";
			document.getElementById("bioDatax").value = bioText;

		}
		function cancelBioEdit() {
			document.getElementById("filledBio").style.display = "block";
			document.getElementById("editBio").style.display = "none";

		}

		function changeAction() {
			document.getElementById("view_report").action = "<?php echo $_SERVER['PHP_SELF']; ?>"
		}
	</script>

  </head>
  
  <body onload="fixUI();">

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="dashboard.php" style="font-size: 28px; margin-left: -5%; color: #195CA4; padding-right: 5%;">
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

	<!-- STUDENT DASHBOARD STARTS -->
    <div id="studentDashboard" style="display: none;">

    	<div class="hero-wrap">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/image_5.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>We are your personal life coach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Welcome <span id="studentName2" style="color: white">student</span>!</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Improving the world</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Have you taken the <a href="assessment.php" onMouseOver="this.style.color='#ccc'" onMouseOut="this.style.color='white'" style="color: white; text-decoration: none;">ASSESSMENT TEST</a> yet?</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_3.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Welcome to lifecoach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Are you ready for one-on-one <a href="counselling.php" onMouseOver="this.style.color='#ccc'" onMouseOut="this.style.color='white'" style="color: white; text-decoration: none;">COUNSELLING</a> from our expert?</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>


    	<div id="fillBio" style="display: none;">

    	<footer class="footer" style="text-align: center; padding-top: 3%;">
			<div class="container-fluid px-lg-5">
				<p style="color: white; font-size: 18px; padding-bottom: 15px">Dear <strong><span id="studentName">student</span></strong>, it seems like you've not filled your bio yet, kindly fill it below here!</p>
			</div>
		</footer>

    	<section class="form-26">
          <div class="form-26-mian2">
            <div class="layer">
              <div class="wrapper">
                <div class="form-inner-cont">
                  <div class="form-right-inf" id="bioForm"> 
                    <div class="signin-form forms-gds" style="width: 50%">
                    <div style="background: rgba(22, 32, 42, 0.8); padding: 5%; overflow: hidden; white-space: nowrap; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block;">
                    <form action="submitBio.php" method="post">
                    	<p>The number of words is: <span id="wordCountY" style="color: white;">n</span></p>
                    	<textarea id="bioDataY" class="form-input" name="bioData" rows="10" style="width: 98%; margin-bottom:20px" placeholder="Enter your bio in 100 or less words..."></textarea>
                      	<div class="form-input" ><button class="btn" name="submitBio">Submit Bio</button></div>
                  	</form>
                  	</div>

                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </section>

        <script>
		    document.getElementById('bioDataY').addEventListener('input', function () {
		        var text1 = this.value,
		        count1 = text1.trim().replace(/\s+/g, ' ').split(' ').length;
		        document.getElementById('wordCountY').textContent = count1;
		        if (count1>100) {
		        	document.getElementById('wordCountY').style.color = "red";	
		        }
		        else
		        	document.getElementById('wordCount').style.color = "white";	
		    });
		</script>

    	</div>

    	<div id="filledBio" style="display: none;">

    	<footer class="footer" style="text-align: center; padding-top: 3%;">
			<div class="container-fluid px-lg-5">
				<p style="color: white; font-size: 18px; padding-bottom: 15px">Dear <strong><span id="studentName">student</span></strong>, we're glad to see that you've already submitted your bio!</p>
			</div>
		</footer>

    	<section class="form-26">
          <div class="form-26-mian2">
            <div class="layer">
              <div class="wrapper">
                <div class="form-inner-cont">
                  <div class="form-right-inf" id="bioForm"> 
                    <div class="signin-form forms-gds" style="width: 50%">
                    <div style="background: rgba(22, 32, 42, 0.8); padding: 5%; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block;">
	                    <div class="forms-26-info">
	                    	<h4><u>Your Bio</u></h4>
		                </div>
	                    <p id="bioView" style="color: white">
	                    loading...	
	                    </p>
	                    <span style="color: lightblue" onclick="makeEditable();"><u>Edit</u></span>
                  	</div>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </section>

    	</div>

    	<div id="editBio" style="display: none;">

    	<footer class="footer" style="text-align: center; padding-top: 3%;">
			<div class="container-fluid px-lg-5">
				<p style="color: white; font-size: 18px; padding-bottom: 15px">Dear <strong><span id="studentName">student</span></strong>, it seems like you've decided to edit your bio!</p>
			</div>
		</footer>

    	<section class="form-26">
          <div class="form-26-mian2">
            <div class="layer">
              <div class="wrapper">
                <div class="form-inner-cont">
                  <div class="form-right-inf" id="bioForm"> 
                    <div class="signin-form forms-gds" style="width: 50%">
                    <div style="background: rgba(22, 32, 42, 0.8); padding: 5%; overflow: hidden; white-space: nowrap; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block;">
                    <form action="submitBio.php" method="post">
                    	<p onclick="cancelBioEdit();" style="color: #cd6155; text-align: right; padding-right: 20px"><u>cancel</u></p>
                    	<p>The number of words is: <span id="wordCount" style="color: white;">n</span></p>
                    	
                    	<textarea id="bioDatax" class="form-input" name="bioData2" rows="10" style="width: 98%; margin-bottom:20px" placeholder="Enter your bio in 100 or less words..."></textarea>
                      	<div class="form-input" ><button class="btn" name="submitNewBio">Update Bio</button></div>
                  	</form>
                  	</div>

                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </section>

        <script>
		    document.getElementById('bioDatax').addEventListener('input', function () {
		        var text2 = this.value,
		        count2 = text2.trim().replace(/\s+/g, ' ').split(' ').length;
		        document.getElementById('wordCount').textContent = count2;
		        if (count2>100) {
		        	document.getElementById('wordCount').style.color = "red";	
		        }
		        else
		        	document.getElementById('wordCount').style.color = "white";	
		    });
		</script>

    	</div>

    </div>
    <!-- STUDENT DASHBOARD ENDS -->


    <!-- PARENT DASHBOARD STARTS -->
    <div id="parentDashboard" style="display: none;">
    	
    	<div class="hero-wrap">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/image_5.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>We are your personal life coach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Welcome <span id="parentName" style="color: white">student</span>!</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Improving the world</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Have you linked your account with your child's yet?</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/image_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-10 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<!-- <h2>Welcome to lifecoach</h2> -->
			            <h1 class="mb-4" style="opacity: 0.9">Scroll down for more details!</h1>
			            <!-- <p><a href="#" class="btn btn-white">Connect with us</a></p> -->
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  	</div>

	  	<footer class="footer" style="text-align: center; padding-top: 3%;">
			<div class="container-fluid px-lg-5">
				<p style="color: white; font-size: 18px; padding-bottom: 15px">Dear <strong><span id="parentName2">parent</span></strong>, if you're not sure what your what your child's user_id is, kindly, follow these steps:<br><br>1. Login with your child's account.<br>2. Click on ACCOUNT tab at the top of the screen. Your child's account details will appear.<br>3. Note down the unique user_id that you'll find there.<br></p>
			</div>
		</footer>

		<div class="layer">
			<!-- adding child -->
			<div id="addChild" style="text-align: center; ">

				<form action="linkChild.php" method="post">
				<table border="1px solid black" align="center" style="padding: 2%">
					<p style="color: black; font-size: 18px; padding-top: 2%">Link your child's account:</p>
				
				<?php
					$conn = mysqli_connect($host, $user, $pwd);
					if ($conn) {
						if (mysqli_select_db($conn, $dbname)) {
							echo "<tr>";
							echo "<td><input type='text' class='form-input' placeholder='enter user id here' name='child_user_id'>";
							echo "<td><input type='submit' value='Link Account' class='ibtn' name='add_child' onclick=\"if(confirm('Do you wish to link this account?')){}else{return false;};\"><br>";
						}
					}
					mysqli_close($conn);
				?>

				</table><br><hr><br>
				</form>
			</div>

			<div id="noAccountsLinked" align="center" style="display: none;"> <p style="color: #C70039; font-size: 18px; padding-top: 2%">Note: No accounts have been linked so far!</p></div>

			<div id="viewChildren" style="text-align: center; display: none;">

				<form action="linkChild.php" method="post" id="view_report">
				<table id="linkedAccountsTable" border="1px solid black" align="center"  style="border-color: black; color: black; font-size: 16px;">

					<p style="color: black; font-size: 18px; padding-top: 2%">Linked accounts:</p>
					
					<tr><th>S.No.</th><th>User ID</th><th>First Name</th><th>Last Name</th><th>Action</th></tr>

				<?php
					$conn = mysqli_connect($host, $user, $pwd);
					if ($conn) {
						if (mysqli_select_db($conn, $dbname)) {
							$sqlc = "SELECT count('parent_id') FROM `RELATIONSHIP`";
							$resultc = mysqli_query($conn, $sqlc);
							while ($rowc = mysqli_fetch_assoc($resultc)) {
								$_SESSION["childCount"] = $rowc["count('parent_id')"];
							}
							
							$sql = "select * from `RELATIONSHIP` where `parent_id` = $_SESSION[user_id]";
							$result = mysqli_query($conn, $sql);

							$num = 1;

							while($row1 = mysqli_fetch_assoc($result)){

								$sql2 =  "select * from `END_USERS` where `user_id` = $row1[student_id]";
								$result2 = mysqli_query($conn, $sql2);

								while($row2 = mysqli_fetch_assoc($result2)){
									echo "<tr>";
									echo "<td>$num</td>";
									echo "<td>$row2[user_id]</td>";
									echo "<td>$row2[first_name]</td>";
									echo "<td>$row2[last_name]</td>";
									echo "<td>";
									echo "<input type='text' name='childInAction$num' value='$row2[user_id]' hidden>";
									echo "<input type='submit' class='ibtn' name='view$num' value='View Report' onclick=\"if(confirm('View report for this account?')){}else{return false;};\" >";
									echo "<input type='submit' class='ibtn2' name='unlink$num' value='Unlink Account' onclick=\"if(confirm('Unlink this account?')){}else{return false;};\" >";

									echo "</td</tr>";
									$num++;
								}
							}
						}
					}mysqli_close($conn);
				?>

				<script type="text/javascript">
					var childCount = parseInt("<?php if (isset($_SESSION['childCount'])) {echo $_SESSION['childCount'];}?>");
					
					if (childCount>0) {
						document.getElementById("viewChildren").style.display = "block";
					}
					else{
						document.getElementById("noAccountsLinked").style.display = "block";
					}
				</script>

				</table>
				</form><br><br><br>
			</div>
		</div>

    </div>
    <!-- PARENT DASHBOARD ENDS -->

    <footer class="footer" style="text-align: center; padding-top: 3%;">
		<div class="container-fluid px-lg-5">
							<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a></p>
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