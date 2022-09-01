<?php 
	session_start();
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

	<script type="text/javascript">
		val=0;
		function control1(){
			document.getElementById("approve_experts").style.display = "block";
	        document.getElementById("ban_accounts").style.display = "none";
		}
		function control2(){
			document.getElementById("approve_experts").style.display = "none";
	        document.getElementById("ban_accounts").style.display = "block";
		}
	</script>

	<script type='text/javascript' src='http://www.skypeassets.com/i/scom/js/skype-uri.js'></script>

</head>

<body style="width: 60%; margin-left:20%; margin-right: 20%">
 
 	<p style="text-align: right;"><a href="logout.php">(logout)</a></p><br>

 	<div id="control_buttons">
 		<button onclick="control1();">Approve Expert Account</button>
 		<button onclick="control2();">Ban User Accounts</button>
 	</div><br><hr><br>

	<div id="ban_accounts" style="display: none; overflow: auto; border: 1px solid black;height: 25%; text-align: center;">

		<form action="#" method="post">

				Ban Accounts:
				<select name="userRole">
					
					<?php
						echo "<option value='0'>select role</option>";
						echo "<option value='1'>Student</option>";
						echo "<option value='2'>Parent</option>";
					?>
				</select>
				<input type="submit" name="viewUsers" value="view" onclick='this.form.action="";'>

				<table border="1px solid black" width="100%">
					<tr><th>user_id</th><th>name</th><th>role</th><th>action</th></tr>
				<?php
					$conn = mysqli_connect($host, $user, $pwd);
						if ($conn) {
							$num = 1;
							if (mysqli_select_db($conn, $dbname)) {
								if (isset($_POST["viewUsers"])) {
									$userRole = $_POST["userRole"];
									$active = "";
									$sql = "select * from `END_USERS` where `role` = $userRole AND `account_status`=1";
									$result = mysqli_query($conn, $sql);
									
									while($row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>$row[user_id]</td>";
										echo "<td>$row[first_name] $row[last_name]</td>";
										if ($userRole==1) {
											echo "<td>Student</td>";	
										}
										else
											echo "<td>Parent</td>";
										echo "<input type='text' name='accInAction$num' value='$row[user_id]' hidden>";
										echo "<td><input type='submit' value='Ban Account' class='btn2' name='banAccount$num' onclick=\"if(confirm('Do you wish to ban this account?')){}else{return false;};\"><br>";
										echo "</td</tr>";
										$num++;
									}
								}
							}
							$num2 = 1;
							while ($num2<=$num) {

								if (isset($_POST["banAccount$num2"])) {
									$user_id= $_POST["accInAction$num2"];
									$sqli = "update `END_USERS` set `account_status`=0 where `user_id`=$user_id";
									$resulti = mysqli_query($conn, $sqli);
									if (mysqli_affected_rows($conn)>0){
										echo '<script>
													alert("Account banned");
											</script>';
									}
									else
										echo '<script>
													alert("Unable to ban account");
											</script>';
								}
								$num2++;
							}
							
						}
						mysqli_close($conn);

				?>
				</table>
		</form>
	</div>
	
	<div id="approve_experts" style="display: none; overflow: auto; border: 1px solid black;height: 25%; text-align: center;">

		<form action="#" method="post">

				Approve Expert Accounts:

				<table border="1px solid black" width="100%">
					<tr><th>expert_id</th><th>name</th><th>phone no</th><th>profession</th><th>experience</th><th>skype name</th><th>action</th></tr>
				<?php
					$conn = mysqli_connect($host, $user, $pwd);
						if ($conn) {
							
							if (mysqli_select_db($conn, $dbname)) {
									$sql = "select * from `EXPERT` where  `account_status`=0";
									$result = mysqli_query($conn, $sql);
									$num = 1;
									while($row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>$row[expert_id]</td>";
										echo "<td>$row[first_name] $row[last_name]</td>";
										echo "<td>$row[phone_number]</td>";
										echo "<td>$row[profession]</td>";
										echo "<td>$row[experience]</td>";

										echo "<td>$row[skype_id]<br>";

										echo "<a style='color: blue; text-decoration:none' href=\"skype:$row[skype_id]?call\">Call?</a><br>";

							

									    echo "</td>";		

										echo "<input type='text' name='accInAction$num' value='$row[expert_id]' hidden>";
										echo "<td><input type='submit' value='Approve Account' class='btn2' name='approveAccount$num' onclick=\"if(confirm('Do you wish to approve this account?')){}else{return false;};\"><br>";
										echo "</td</tr>";
										$_SESSION["action_no"]=$num;
										$num++;
									}
							}
							$num2 = 1;
							while ($num2<=$num) {

								if (isset($_POST["approveAccount$num2"])) {
									$num3=$num-1;
									$user_id= $_POST["accInAction$num2"];
									$sqli = "update `EXPERT` set `account_status`=1 where `expert_id`=$user_id";
									$resulti = mysqli_query($conn, $sqli);
									if (mysqli_affected_rows($conn)>0){
										echo '<script>
													alert("Account approved");
													window.location.href="adminPanel.php";
											</script>';
									}
									else
										echo '<script>
													alert("Unable to approve account");
													window.location.href="adminPanel.php";
											</script>';
								}
								$num2++;
							}
							
						}
						mysqli_close($conn);

				?>
				</table>
		</form>
	</div>

</body>

</html>