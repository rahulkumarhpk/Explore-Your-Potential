<?php 
	session_start();
	include 'database.php';

	if (isset($_POST["login"])) { // authenticating user 

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$email_id = $_POST["email_id"]; $password = $_POST["password"];
				$sql1 = "select * from `END_USERS` where `email_id` = '$email_id' AND `password` = '$password' AND `account_status` = 1";
				$result1 = mysqli_query($conn, $sql1);
				if(mysqli_num_rows($result1)>0){
					$user_data = mysqli_fetch_assoc($result1);
					$role = $user_data['role'];
					$_SESSION['first_name'] = $user_data['first_name'];
					$_SESSION['user_id'] = $user_data['user_id'];
					$_SESSION['role'] = $user_data['role'];
					$_SESSION['last_name'] = $user_data['last_name'];
					$_SESSION['dob'] = $user_data['dob'];
					$_SESSION['email_address'] = $user_data['email_id'];
					$_SESSION['phone_number'] = $user_data['phone_no'];

					$sql2 = "select * from `BIOS` where `user_id` = '$_SESSION[user_id]'";
					$result2 = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($result2)>0){
						$_SESSION['bio'] = 1;
						$user_data2 = mysqli_fetch_assoc($result2);
						$_SESSION['bioText'] = $user_data2['bio'];
					}
					else
						$_SESSION['bio'] = 2;

					echo '<script>
								alert("Login Successful");
								window.location.href="dashboard.php";
						</script>';
				}
				else
					echo '<script>
								alert("Login unsuccessful");
								window.location.href="signin.html";
						</script>';
			}
			else
				echo '<script>
							alert("Login unsuccessful");
							window.location.href="signin.html";
					</script>';
		}
		else
			echo '<script>
						alert("Login unsuccessful");
						window.location.href="signin.html";
				</script>';
		mysqli_close($conn);
	}


	if (isset($_POST["adminLogin"])) { // authenticating user 
		if ($_POST["username"]=="admin" && $_POST["password"]=="admin1234") {
			echo '<script>
						alert("Login successful");
						window.location.href="adminPanel.php";
				</script>';
		}
		else
			echo '<script>
						alert("Login unsuccessful");
						window.location.href="adminLogin.html";
				</script>';
	}

	if (isset($_POST["expertLogin"])) { // authenticating expert 

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$email_id = $_POST["email_id"]; $password = $_POST["password"];
				$sql1 = "select * from `EXPERT` where `email_address` = '$email_id' AND `password` = '$password' AND `account_status` = 1";
				$result1 = mysqli_query($conn, $sql1);
				if(mysqli_num_rows($result1)>0){
					$user_data = mysqli_fetch_assoc($result1);
					$role = $user_data['role'];
					$_SESSION['first_name'] = $user_data['first_name'];
					$_SESSION['user_id'] = $user_data['expert_id'];
					$_SESSION['role'] = $user_data['role'];
					$_SESSION['last_name'] = $user_data['last_name'];
					$_SESSION['dob'] = $user_data['dob'];
					$_SESSION['email_address'] = $user_data['email_address'];
					$_SESSION['phone_number'] = $user_data['phone_number'];
					$_SESSION['profession'] = $user_data['profession'];
					$_SESSION['experience'] = $user_data['experience'];


					echo '<script>
								alert("Login Successful");
								window.location.href="counselling.php";
						</script>';
				}
				else
					echo '<script>
								alert("Login unsuccessful");
								window.location.href="expertSignIn.html";
						</script>';
			}
			else
				echo '<script>
							alert("Login unsuccessful");
							window.location.href="signin.html";
					</script>';
		}
		else
			echo '<script>
						alert("Login unsuccessful");
						window.location.href="signin.html";
				</script>';
		mysqli_close($conn);
	}
?>