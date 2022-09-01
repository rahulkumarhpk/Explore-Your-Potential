<?php 
	session_start();
	include 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?famliy=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
    	function returnBack(){
    		window.location.href="dashboard.php";
    	}
    </script>

</head>
<body>

	<section class="form-26">
    <div class="form-26-mian2">
      <div class="layer">
        <div class="wrapper">
          <div class="form-inner-cont">
            <div class="form-right-inf" id="bioForm"> 
                    <div class="signin-form forms-gds" style="width: 50%">
                    	<div id="test_view" style="background: rgba(22, 32, 42, 0.8); padding: 5%; box-shadow: 10px 10px 5px #000; border-radius: 5%; display: block; text-align: center; color: white; font-size: 14px">

<?php
	if (isset($_POST["add_child"])) { // linking account 

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {

				$s_user_id = $_POST['child_user_id'];
				$p_user_id = $_SESSION['user_id'];

				$sql1 = "INSERT INTO `RELATIONSHIP`(`parent_id`, `student_id`) VALUES ($p_user_id, $s_user_id)";
				if(mysqli_query($conn, $sql1)){
					echo '<script>
								alert("Account linked");
								window.location.href="dashboard.php";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to link account");
								window.location.href="dashboard.php";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to link account");
							window.location.href="dashboard.php";
					</script>';
		}
		else
			echo '<script>
						alert("Unable to link account");
						window.location.href="dashboard.php";
				</script>';
		mysqli_close($conn);
	}

	else{

		$num=0;
		while($num<$_SESSION["childCount"]){
			$num++;

			if (isset($_POST["unlink$num"])) { // unlinking account
				$conn = mysqli_connect($host, $user, $pwd);
				if ($conn) {
					if (mysqli_select_db($conn, $dbname)) {

						$accToUnlink = $_POST["childInAction$num"];

						$sqla = "DELETE from `RELATIONSHIP` where `student_id` = $accToUnlink";
						if(mysqli_query($conn, $sqla)){
							echo '<script>
										alert("Account unlinked");
										window.location.href="dashboard.php";
								</script>';
						}
						else
							echo '<script>
										alert("Unable to unlink account");
										window.location.href="dashboard.php";
								</script>';
					}
					else
							echo '<script>
										alert("Unable to unlink account");
										window.location.href="dashboard.php";
								</script>';
				}
				else
							echo '<script>
										alert("Unable to unlink account");
										window.location.href="dashboard.php";
								</script>';
			}

			if (isset($_POST["view$num"])) { // viewing report
				$conn = mysqli_connect($host, $user, $pwd);
				if ($conn) {
					if (mysqli_select_db($conn, $dbname)) {

						$reportToView = $_POST["childInAction$num"];

						$sqla = "SELECT * from `REPORT` where `user_id` = $reportToView";
						$resulta = mysqli_query($conn, $sqla);
						if(mysqli_num_rows($resulta)>0){
							$report_data = mysqli_fetch_assoc($resulta);
							$user_id = $report_data["user_id"];
							$personality =  $report_data["personality"];
							$remarks =  $report_data["remarks"];

							$sqlb = "SELECT * from `END_USERS` where `user_id` = $user_id";
							$resultb = mysqli_query($conn, $sqlb);
							$user_data = mysqli_fetch_assoc($resultb);
							$name = $user_data["first_name"];

							echo "<h4 ><u>$name's report</u></h4>";

							// personality
							echo "<strong>What we think about ".$name."'s personality:</strong><br>";
							if ($personality=="left") {
								echo "<p>He is a way logical and analytical thinker. He enjoys mathematics more than any subject. Some of the points that define him are - <br>1. He is a goal setter <br>2.He can interpret information well <br> 3. he enjoy action movies more and answer questions spontaneously<br> In short, he is rational and intelligent. He enjoy long math calculations and are able to remember dates. <br>It is advised that you are already upto mark but should take more risks.</p>";
							}
							else if ($personality=="right") {
								echo "<p>he think artistically. In short,he is creative thinkers. he struggles to make decisions,but is witty and funny,easily get lost,enjoy listening music while studying, dislike reading etc. Subjects like History and English tend to suit him more. He is unpredictable. <br>He should write personal essays,end building castles in air,that is,stop daydreaming. he should not overanalyse every aspect. <br>He is ,ofcourse, well-talented but work more towards finishing the tasks.</p>";
							}

							// remarks;
							echo "<br><strong>What our expert has to say to ".$name.":</strong><br>";
							if ($remarks==Null) {
								echo "<span style='color:#cd6155'>Warning:</span> Counselling session hasn't been attended yet!<br><br>";
							}
							else{
								echo "".$remarks."<br><br>";
							}
							
					

							echo "<span style='color: lightblue' onclick='returnBack();'><u>Return</u></span>";
						}
						else
							echo '<script>
										alert("Unable to view report. Perhaps your child hasn\'t taken the test yet!");
										window.location.href="dashboard.php";
								</script>';
					}
					else
							echo '<script>
										alert("Unable to view report. Perhaps your child hasn\'t taken the test yet!");
										window.location.href="dashboard.php";
								</script>';
				}
				else
							echo '<script>
										alert("Unable to view report. Perhaps your child hasn\'t taken the test yet!");
										window.location.href="dashboard.php";
								</script>';
			}
			
		}
		mysqli_close($conn);
	}

?>

	</div>
            </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </section>    

</body>
</html>
