<?php
	session_start();
	session_unset();
	session_destroy();
	echo '<script>
			alert("You\'ve logged out successfully");
			window.location.href="index.php";
	</script>';
?>