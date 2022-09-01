<?php 
  session_start();
  error_reporting(0);
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
    <title>Life Coach - Free Bootstrap 4 Template by Colorlib</title>
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

        document.getElementById("studentArea").style.display = "block";
      }
      else if (role == "2") {
        // alert("in condition 2");
        document.getElementById("signedIn0").style.display = "block";
        document.getElementById("signedIn3").style.display = "block";
        document.getElementById("signedIn4").style.display = "block";
        document.getElementById("firstName").innerHTML = first_name+" ";
      }
      else if (role == "3") {
        // alert("in condition 2");
        document.getElementById("signedIn2").style.display = "block";
        document.getElementById("signedIn3").style.display = "block";
        document.getElementById("signedIn4").style.display = "block";
        document.getElementById("firstName").innerHTML = first_name+" ";

        document.getElementById("home_logo").href= "counselling.php";
        document.getElementById("expertArea").style.display = "block";
      }

    }

    function showBio(){
      document.getElementById("readBio").style.display = "block";
      document.getElementById("emptyBio").style.display = "block";
    }

    </script>
  </head>
  
  <body onload="fixUI();">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a id="home_logo" class="navbar-brand" href="dashboard.php" style="font-size: 28px; margin-left: -5%; color: #195CA4; padding-right: 5%;">
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
            <li id="signedIn1" class="nav-item" style="display: none;"><a href="assessment.php" class="nav-link">Assessment Test</a></li>
              <li id="signedIn2" class="nav-item active" style="display: none;"><a href="counselling.php" class="nav-link">Counselling</a></li>
            
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
    

    <!-- WORKING AREA STARTS -->
    <div style="text-align: center;">
    

    <section class="form-26" >
          <div class="form-26-mian2" >
            <div class="layer">
              <div class="wrapper">
                <div class="form-inner-cont">
                  <div class="form-right-inf"> 
                    <div class="signin-form forms-gds" style="width: 60%;">
                    <div style="background: rgba(22, 32, 42, 0.8); padding: 5%; overflow: hidden; white-space: nowrap; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block;">

                    <!-- STUDENT AREA -->

                    <div id="studentArea" style="display: none;">

                    <form action="submitQuery.php" id="queryForm" method="post" style="border-style: solid; padding: 5px">
                      <p>The number of words is: <span id="wordCountY" style="color: white;">n</span></p>
                      <textarea id="bioDataY" class="form-input" name="queryData" rows="3" style="width: 98%; margin-bottom:20px" placeholder="Ask your query in 50 or less words..." required></textarea><br>
                      <span style="color: white">Skype Name:&nbsp;&nbsp;</span><input type="text" name="skype_name" placeholder="live:SkypeName" required style="width: 50%; margin-bottom: 4%">
                        <div class="form-input" ><button class="btn" name="submitQuery">Submit Query</button></div>
                    </form><br><br>



                    <div style="color: white; overflow: auto; height: 25%; text-align: center;">

                      <form action="#" method="post">

                          <span style="font-size: 20px">Your previous queries:</span>

                          <table width="100%">
                            <!-- <tr><th>expert_id</th><th>name</th><th>phone no</th><th>profession</th><th>experience</th><th>skype name</th><th>action</th></tr> -->
                          <?php
                            $conn = mysqli_connect($host, $user, $pwd);
                              if ($conn) {
                                
                                if (mysqli_select_db($conn, $dbname)) {
                                    $sql = "select * from `QUERIES` where  `user_id`=$_SESSION[user_id]";
                                    $result = mysqli_query($conn, $sql);
                                    $num = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                      // echo "<div style='border: 1px solid white;'>";
                                      echo "<tr style='border-top: thin solid;'>";
                                      echo "<td style='border-left: thin solid; border-right: thin solid; text-align:right;'>$row[timestamp]</td>";
                                      echo "</tr>";
                                      echo "<tr style='border-left: thin solid; border-right: thin solid'>";
                                      echo "<td style='font-size: 16px; text-align:left'>&nbsp;&nbsp;&nbsp;&nbsp;Query: <i>$row[query]</i></td>";
                                      echo "</tr>";
                                      echo "<tr style='border-bottom: thin solid; border-left: thin solid; border-right: thin solid; text-align:right;'>";
                                      echo "<td>Query status: ";
                                      if ($row['query_status']==0) {
                                        echo "Unanswered</td>";
                                      }
                                      else
                                        echo "Answered</td>";
                                      
                                      echo "</tr>";
                                    }
                                }
                                
                              }
                              mysqli_close($conn);

                          ?>
                          </table>
                      </form>
                    </div>

                    </div>

                    <!-- STUDENT AREA ENDS -->


                    <!-- EXPERT AREA -->

                    <div id="expertArea" style="display: none;">

                    <div style="color: white; overflow: auto; height: 25%; text-align: center;">

                          <u><span style="font-size: 20px">Unanswered queries:</span></u><br><br><br>
                          <form action="linkQuery.php" method="post" id="view_report">
                          <table width="100%">
                            <!-- <tr><th>expert_id</th><th>name</th><th>phone no</th><th>profession</th><th>experience</th><th>skype name</th><th>action</th></tr> -->
                          <?php
                            $conn = mysqli_connect($host, $user, $pwd);
                              if ($conn) {
                                
                                if (mysqli_select_db($conn, $dbname)) {
                                    $sql = "select * from `QUERIES` where  `query_status`=0";
                                    $result = mysqli_query($conn, $sql);

                                    //counting unanswered queries
                                    $sqlc = "SELECT count('query') FROM `QUERIES` where query_status=0";
                                    $resultc = mysqli_query($conn, $sqlc);
                                    while ($rowc = mysqli_fetch_assoc($resultc)) {
                                      $_SESSION["queryCount"] = $rowc["count('query')"];
                                    }

                                    if ($_SESSION["queryCount"]==0) {
                                      echo "No new queries!";
                                    }
                                    
                                    $num = 1;

                                    while($row = mysqli_fetch_assoc($result)){
                                      // echo "<div style='border: 1px solid white;'>";
                                      echo "<tr style='border-top: thin solid;'>";
                                      echo "<td style='border-left: thin solid; border-right: thin solid; text-align:right;'>$row[timestamp]</td>";
                                      echo "</tr>";

                                      $sqla = "SELECT first_name, last_name FROM `END_USERS` WHERE user_id = $row[user_id]";
                                      $resulta = mysqli_query($conn, $sqla);
                                      $rowa = mysqli_fetch_assoc($resulta);

                                      

                                      echo "<tr style='border-left: thin solid; border-right: thin solid'>";
                                      echo "<td style='text-align:left; font-size: 16px'><b>&nbsp;&nbsp;&nbsp;&nbsp;$rowa[first_name] $rowa[last_name]&nbsp;&nbsp;
                                        ( <a style='color: #03ddff; text-decoration:none' href=\"skype:$row[skype_name]?call\">Call</a> / 
                                          <a style='color: #03ddff; text-decoration:none' href=\"skype:$row[skype_name]?chat\">Chat</a> )
                                        </b></td>";
                                      echo "</tr>";

                                      echo "<tr style='border-left: thin solid; border-right: thin solid'>";
                                      echo "<td style='font-size: 16px; text-align:left'>&nbsp;&nbsp;&nbsp;&nbsp;Query: <i>$row[query]</i></td>";
                                      echo "</tr>";
                                      echo "<tr style=' border-left: thin solid; border-right: thin solid; text-align:right;'>";
                                      echo "<td>Query status: ";
                                      if ($row['query_status']==0) {
                                        echo "Unanswered</td>";
                                      }
                                      else
                                        echo "Answered</td>";
                                      echo "</tr>";

                                      $sqlb = "SELECT bio FROM `BIOS` WHERE user_id = $row[user_id]";
                                      $resultb = mysqli_query($conn, $sqlb);
                                      $rowb = mysqli_fetch_assoc($resultb);

                                      echo "<tr>";
                                      echo "<td style='border-left: thin solid; border-right: thin solid'>";
                                      echo "<u style='color: white'>User's bio</u>";
                                      if($rowb['bio']==null)
                                        echo "<br><span id='emptyBio' style='display:block; color: #ff9898'>Bio hasn't been filled yet!</span";
                                      else
                                        echo "<div id='readBio' style=display:block;'>$rowb[bio]</div>";
                                      echo "</td></tr>";

                                      echo "<tr style='border-bottom: thin solid;'>";
                                      echo "<td style='border-left: thin solid; border-right: thin solid'>";
                                      

                                      echo "<input type='text' name='queryInAction$num' value='$row[s_no]' hidden>";
                                      echo "<input type='text' name='userInAction$num' value='$row[user_id]' hidden>";
                                      echo "<input type='submit' class='ibtn' style='width:20%' name='view$num' value='View Report' onclick=\"if(confirm('View report for this account?')){}else{return false;};\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                      echo "<input type='submit' class='ibtn2' style='width:20%' name='dismiss$num' value='Dismiss Query' onclick=\"if(confirm('Dismiss this query?')){}else{return false;};\" >";

                                      echo "</td></tr>";
                                      $num++;
                                    }
                                }
                                
                              }
                              mysqli_close($conn);

                          ?>
                          </table><br><br>
                      </form>
                    </div>

                    </div>

                    </div>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </section>
    

    </div>
    <!-- WORKING AREA ENDS -->


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

  <script>
      document.getElementById('bioDataY').addEventListener('input', function () {
          var text1 = this.value,
          count1 = text1.trim().replace(/\s+/g, ' ').split(' ').length;
          document.getElementById('wordCountY').textContent = count1;
          if (count1>100) {
            document.getElementById('wordCountY').style.color = "red";  
          }
          else
            document.getElementById('wordCountY').style.color = "white"; 
      });
  </script>
    
  </body>
</html>