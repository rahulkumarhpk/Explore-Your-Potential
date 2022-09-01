<?php 
	session_start();
	include 'database.php';

	// echo "1";
	if (isset($_POST["submitBio"])) { 
		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$user_id = $_SESSION[user_id]; $bio = $_POST["bioData"];
				if (str_word_count($bio)<=100) {
					$sql1 = "INSERT INTO `BIOS`(`user_id`, `bio`) VALUES ($user_id, \"$bio\")";
					if(mysqli_query($conn, $sql1)){
						$_SESSION['bio'] = 1;

						$sql2 = "select * from `BIOS` where `user_id` = '$_SESSION[user_id]'";
						$result2 = mysqli_query($conn, $sql2);
						if(mysqli_num_rows($result2)>0){
							$user_data2 = mysqli_fetch_assoc($result2);
							$_SESSION['bioText'] = $user_data2['bio'];
						}

						echo '<script>
								alert("Bio submitted");
								window.location.href="dashboard.php";
						</script>';
					}
					else{
						echo '<script>
								alert("Unable to submit bio");
								window.location.href="dashboard.php";
						</script>';
					}
				}
				else{
					echo '<script>
								alert("Word length exceeds 100");
								window.location.href="dashboard.php";
						</script>';
				}
					
			}
			else{
				echo '<script>
						alert("Unable to submit bio");
						window.location.href="dashboard.php";
				</script>';
			}
			
		}
		else{
			echo '<script>
					alert("Unable to submit bio");
					window.location.href="dashboard.php";
			</script>';
		}
		mysqli_close($conn);
	}


	if (isset($_POST["submitNewBio"])) {
		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$user_id = $_SESSION["user_id"]; $bio2 = $_POST["bioData2"];
				if (str_word_count($bio2)<=100) {
					$sql1 = "UPDATE `BIOS` SET `bio`= '$bio2' WHERE `user_id` = '$_SESSION[user_id]'";
					if(mysqli_query($conn, $sql1)){
						$_SESSION['bio'] = 1;

						$sql2 = "select * from `BIOS` where `user_id` = '$_SESSION[user_id]'";
						$result2 = mysqli_query($conn, $sql2);
						if(mysqli_num_rows($result2)>0){
							$user_data2 = mysqli_fetch_assoc($result2);
							$_SESSION['bioText'] = $user_data2['bio'];
						}

						echo '<script>
								alert("Bio updated");
								window.location.href="dashboard.php";
						</script>';
					}
					else{
						echo '<script>
								alert("Unable to submit bio");
								window.location.href="dashboard.php";
						</script>';
					}
				}
				else{
					echo '<script>
								alert("Word length exceeds 100");
								window.location.href="dashboard.php";
						</script>';
				}
					
			}
			else{
				echo '<script>
						alert("Unable to submit bio");
						window.location.href="dashboard.php";
				</script>';
			}
			
		}
		else{
			echo '<script>
					alert("Unable to submit bio");
					window.location.href="dashboard.php";
			</script>';
		}
		mysqli_close($conn);
	}
?>