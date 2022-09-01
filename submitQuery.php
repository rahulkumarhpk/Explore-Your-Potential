<?php 
	session_start();
	include 'database.php';

	if (isset($_POST["submitQuery"])) { 
		$conn = mysqli_connect($host, $user, $pwd);
		if ($conn) {
			if (mysqli_select_db($conn, $dbname)) {
				$user_id = $_SESSION['user_id']; $query = $_POST["queryData"]; $skype_name = $_POST["skype_name"];
				if (str_word_count($query)<=50) {
					$sql1 = "INSERT INTO `QUERIES`(`user_id`, `query`, `timestamp`, `skype_name`, `query_status`) VALUES ($user_id, \"$query\", now(), '$skype_name', 0)";
					if(mysqli_query($conn, $sql1)){

						echo '<script>
								alert("Query submitted");
								window.location.href="counselling.php";
						</script>';
					}
					else{
						echo '<script>
								alert("Unable to submit query");
								window.location.href="counselling.php";
						</script>';
					}
				}
				else{
					echo '<script>
								alert("Word length exceeds 100");
								window.location.href="counselling.php";
						</script>';
				}
					
			}
			else{
				echo '<script>
						alert("Unable to submit query");
						window.location.href="counselling.php";
				</script>';
			}
			
		}
		else{
			echo '<script>
					alert("Unable to submit query");
					window.location.href="counselling.php";
			</script>';
		}
		mysqli_close($conn);
	}

?>