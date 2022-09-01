<?php 
	session_start();
	include 'database.php';

	if (isset($_POST["register"])) { // registering user 
		
		$user_id = '';

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {

				while (1) {
					$user_id = mt_rand(10000000,99999999);
					$sql2 = "select * from `END_USERS` where `user_id` = '$user_id'";
					$result2 = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($result2)>0){
						continue;
					}
					else break;
				}

				echo "<br>after loop";

				$first_name = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$dob = $_POST["dob"];
				$email_id = $_POST["email_id"];
				$password = $_POST["password"];
				$phone_no = $_POST["phone"];
				$role = $_POST["role"];
				$sql1 = "INSERT INTO `END_USERS`(`user_id`, `first_name`, `last_name`, `dob`, `email_id`, `phone_no`, `password`, `role`, `account_status`) VALUES ($user_id, '$first_name', '$last_name', '$dob', '$email_id', '$phone_no', '$password', $role, 1)";
				if(mysqli_query($conn, $sql1)){
					echo '<script>
								alert("Registration Successful");
								window.location.href="signin.html";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to register");
								window.location.href="register.html";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to register");
							window.location.href="register.html";
					</script>';
		}
		else
			echo '<script>
						alert("Unable to register");
						window.location.href="register.html";
				</script>';
		mysqli_close($conn);
	}

	if (isset($_POST["deleteAcc"])) { // deleting user
		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$sql1 = "update `END_USERS` set `account_status`=0 where `user_id`=$_SESSION[user_id]";
				$result1 = mysqli_query($conn, $sql1);
				if (mysqli_affected_rows($conn)>0){
					session_unset();
					session_destroy();
					echo '<script>
								alert("Account deleted");
								window.location.href="index.php";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to delete account");
								window.location.href="account.php";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to delete account");
							window.location.href="account.php";
					</script>';
			}
			else
				echo '<script>
							alert("Unable to delete account");
							window.location.href="account.php";
					</script>';

		mysqli_close($conn);
	}


	if (isset($_POST["expertRegister"])) { // registering user 
		
		$user_id = '';

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {

				while (1) {
					$user_id = mt_rand(10000000,99999999);
					$sql2 = "select * from `EXPERT` where `expert_id` = '$user_id'";
					$result2 = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($result2)>0){
						continue;
					}
					else break;
				}

				$first_name = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$dob = $_POST["dob"];
				$email_id = $_POST["email_id"];
				$password = $_POST["password"];
				$skypeid = $_POST["skypeid"];
				$phone_no = $_POST["phone"];
				$profession = $_POST["profession"];
				$experience = $_POST["experience"];
				$sql1 = "INSERT INTO `EXPERT`(`expert_id`, `first_name`, `last_name`, `dob`, `email_address`, `password`, `phone_number`, `profession`, `experience`, `account_status`, `skype_id`) VALUES ($user_id, '$first_name', '$last_name', '$dob', '$email_id', '$password', '$phone_no', '$profession', '$experience', 0, '$skypeid')";
				if(mysqli_query($conn, $sql1)){
					echo '<script>
								alert("Successfully applied");
								window.location.href="index.php";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to apply");
								window.location.href="expertRegistration.html";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to apply");
							window.location.href="expertRegistration.html";
					</script>';
		}
		else
			echo '<script>
						alert("Unable to apply");
						window.location.href="expertRegistration.html";
				</script>';
		mysqli_close($conn);
	}

	if (isset($_POST["deleteExpert"])) { // deleting expert
		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$sql1 = "update `EXPERT` set `account_status`=0 where `expert_id`=$_SESSION[user_id]";
				$result1 = mysqli_query($conn, $sql1);
				if (mysqli_affected_rows($conn)>0){
					session_unset();
					session_destroy();
					echo '<script>
								alert("Account deleted");
								window.location.href="index.php";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to delete account");
								window.location.href="account.php";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to delete account");
							window.location.href="account.php";
					</script>';
			}
			else
				echo '<script>
							alert("Unable to delete account");
							window.location.href="account.php";
					</script>';

		mysqli_close($conn);
	}
?>