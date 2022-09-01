<?php 
  session_start();
  include 'database.php';
  if (!isset($_SESSION['user_id'])) {
    echo '<script>
        alert("You need to sign in to access this page");
        window.location.href="signin.html";
    </script>';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accessment Test</title>
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

    function testView(){
      var view = "<?php if (isset($_SESSION['testView'])) {echo $_SESSION['testView'];}?>";
      if (view==0) {
        document.getElementById("test_view").style.display = "none";
        document.getElementById("result_view").style.display = "block";
      }
      else if (view==1) {
        document.getElementById("test_view").style.display = "block";
        document.getElementById("result_view").style.display = "none";
      }

      else if (view=="") {
        alert('Kindly refresh the page')
      }
    }

    </script>

  </head>
  
  <body onload="fixUI(); testView();">

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
            <li id="notSignedIn0" class="nav-item" style="display: none;"><a href="index.php" class="nav-link">Home</a></li>
            <li id="signedIn0" class="nav-item" style="display: none;"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
            <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->          
            <li id="signedIn1" class="nav-item active" style="display: none;"><a href="assessment.php" class="nav-link">Assessment Test</a></li>
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

    <!-- WORKING AREA -->
    <section class="form-26">
    <div class="form-26-mian2">
      <div class="layer">
        <div class="wrapper">
          <div class="form-inner-cont">
            <div class="form-right-inf" id="bioForm"> 
                    <div class="signin-form forms-gds" style="width: 50%">
        <form action="#" method="post" >
          <div id="test_view" style="background: rgba(22, 32, 42, 0.8); padding: 5%; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block; text-align: center; color: white; font-size: 14px">
          
          <?php
            $conn = mysqli_connect($host, $user, $pwd);
            if ($conn) {
              if (!isset($_SESSION["q"])) {
                $_SESSION["q"] = 1;
                $_SESSION["left"] = 0;
                $_SESSION["right"] = 0;
              }
              
              if (mysqli_select_db($conn, $dbname)) {
                  $user_idr = $_SESSION["user_id"];
                  $sqlr = "select * from `REPORT` where `user_id` = $user_idr";
                  $resultr = mysqli_query($conn, $sqlr);
                  if(mysqli_num_rows($resultr)>0){
                    $_SESSION["testView"] = 0;
                  }
                  else
                    $_SESSION["testView"] = 1;

                  $sql = "select * from `questions` where `serial_no` = $_SESSION[q]";
                  $result = mysqli_query($conn, $sql);
                  
              
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<p><span style='color:#ddd'>Question $_SESSION[q]:&nbsp;</span> $row[question]</p>";
                    echo "<input type='radio' name='questionInAction' value='1' checked='checked'>Agree&nbsp;&nbsp;";
                    echo "<input type='radio' name='questionInAction' value='0' checked='checked'>Neutral&nbsp;&nbsp;";
                    echo "<input type='radio' name='questionInAction' value='2' >Disagree<br><br>";

                    echo "<input type='submit' value='Submit Answer' class='ibtn' style='width:20%' name='submitAnswer'><br>";
  
                  }
                
              }

              if (isset($_POST["submitAnswer"])) { // odd = right
                if ($_SESSION["q"] < 21) {


                  
                    if ($_POST["questionInAction"] == 1 && $_SESSION["q"]%2 == 0) {
                      $_SESSION["left"] = $_SESSION["left"]+1;
                    }
                    if ($_POST["questionInAction"] == 1 && $_SESSION["q"]%2 != 0) {
                      $_SESSION["right"] = $_SESSION["right"]+1;
                    }

                    $_SESSION["q"]++; 
                }

                if ($_SESSION["q"] >= 21) {
                  
                  

                  if ($_SESSION["left"]>$_SESSION["right"]) {
                    $_SESSION["result"] = "left";
                  }
                  else
                    $_SESSION["result"] = "right";

                  $_SESSION["q"] = 1; 
                }
              }

              if (isset($_SESSION["result"])) {
                $user_id = $_SESSION["user_id"];
                $result = $_SESSION["result"];
                $sql1 = "INSERT INTO `REPORT`(`user_id`, `personality`) VALUES ($user_id, '$result')";
                mysqli_query($conn, $sql1);
              }
              
            }
          
            mysqli_close($conn);

        ?>

        </div>

        </form>

        <div id="result_view" style="background: rgba(22, 32, 42, 0.8); padding: 5%; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block; text-align: center; color: white; font-size: 14px">

          <?php
            $conn = mysqli_connect($host, $user, $pwd);
            if ($conn) {
              if (mysqli_select_db($conn, $dbname)) {
                $user_idr2 = $_SESSION["user_id"];
                $sqlr2 = "select * from `REPORT` where `user_id` = $user_idr2";
                $resultr2 = mysqli_query($conn, $sqlr2);
                if(mysqli_num_rows($resultr2)>0){
                  $user_data = mysqli_fetch_assoc($resultr2);
                  $_SESSION["result"] = $user_data["personality"];
                  echo "<h4 style='margin-top:-20px;'><u>Your assessment test result</u></h4>";
                  if ($_SESSION["result"]=="right") {
                    echo "<p>You think artistically. In short,you are creative thinkers. You struggles to make decisions,but are witty and funny,easily get lost,enjoy listening music while studying, dislike reading etc. You should hold only certain subjects in esteem like History or English. You are unpredictable. <br>You should write personal essays,end building castles in air,that is,stop daydreaming. You should not overanalyse every aspect. <br>You are ,ofcourse, well-talented but work more towards finishing the tasks.</p>";
                  }
                  else if ($_SESSION["result"]=="left") {
                    echo "<p>You are a way logical and analytical thinker. You enjoy mathematics more than any subject. Some of the points that define you are - <br>1. You are goal setter <br>2.You can interpret information well <br> 3. You enjoy action movies more and answer questions spontaneously<br> In short, you people are rational and intelligent. You enjoy long math calculations and are able to remember dates. <br>It is advised that you are already upto mark but should take more risks.</p>";
                  }
                }
              }
            }
            mysqli_close($conn);
          ?>

        </div>

            </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </section>    



        <!-- WORKING AREA -->

    <footer class="footer" style="text-align: center;">
      <div class="container-fluid px-lg-5">
            <div class="row mt-md-5">
              <div class="col-md-12">
                <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
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