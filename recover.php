<?php 
	session_start();
	include 'database.php';
	error_reporting(0);

	if (isset($_POST["getOTP"])) { // getting otp after authenticating user 

		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$phone = $_POST["phone"]; 
				$sql1 = "select * from `END_USERS` where `phone_no` = '$phone' AND `account_status` = 1";
				$result1 = mysqli_query($conn, $sql1);
				if(mysqli_num_rows($result1)>0){
					$user_data = mysqli_fetch_assoc($result1);
					$_SESSION['userInRecovery'] = $user_data['user_id'];

					$_SESSION['original_otp'] = mt_rand(100000, 999999);

					// echo $_SESSION['original_otp'];

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://www.uengage.in/ueapi/sendTemplate?usr=243&pwd=life123&mobileNo=$phone&senderId=SSTECH&templateId=1479&param=$_SESSION[original_otp]");
				    curl_setopt($ch, CURLOPT_HEADER, 0);
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				    curl_exec($ch);
				    curl_close($ch);

					echo '<script>
								alert("OTP sent");
								window.location.href="forgotPass.php";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to find this number");
								window.location.href="forgotPass.php";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to find this number");
							window.location.href="forgotPass.php";
					</script>';
		}
		else
			echo '<script>
						alert("Unable to find this number");
						window.location.href="forgotPass.php";
				</script>';
		mysqli_close($conn);
	}

	if(isset($_POST["submitOTP"])) {
			$otp = $_POST['otp'];
			if ($otp==$_SESSION['original_otp'] && $otp != "") {
				$_SESSION["passwordRecoveryEligibility"] = 1;

				echo '<script>
						alert("OTP verified");
						window.location.href="setNewPassword.php";
				</script>';
			}
			else
				echo '<script>
						alert("Wrong OTP");
						window.location.href="forgotPass.php";
				</script>';
	}

	if (isset($_POST["setNewPass"])) { // resetting pass


		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$newPass = $_POST["newPass"]; 
				$sql1 = "UPDATE `END_USERS` SET `password`='$newPass' WHERE `user_id`= $_SESSION[userInRecovery]";
				$result1 = mysqli_query($conn, $sql1);
				if(mysqli_query($conn, $sql1)){

					echo '<script>
								alert("Password reset");
								window.location.href="signin.html";
						</script>';
				}
				else
					echo '<script>
								alert("Unable to reset password 1");
								window.location.href="forgotPass.php";
						</script>';
			}
			else
				echo '<script>
							alert("Unable to reset password 2");
							window.location.href="forgotPass.php";
					</script>';
		}
		else
			echo '<script>
						alert("Unable to reset password 3");
						window.location.href="forgotPass.php";
				</script>';
		mysqli_close($conn);
	}

?>