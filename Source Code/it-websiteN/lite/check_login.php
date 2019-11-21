<html>
<head>
	<script src="jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php
	session_start(); 

	$username = $_POST["username"];
	$password = $_POST["password"];

	//DB
	include("db/db.php"); 

	$sql = "SELECT * FROM `M_USER` WHERE `USER_USERNAME` ='$username' and `USER_PASSWORD` ='$password' ";  

	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	if (!$result) {                                                          
		echo ("<script = 'javascript'>alert('Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง')
			window.location.href='page-login.php';</script>");
	} else {
		// var_dump($result);
		$_SESSION["USER_ID"] = $result['USER_ID'];
		$_SESSION["USER_USERNAME"] = $result['USER_USERNAME'];
		$_SESSION["USER_FIRSTNAME"] = $result['USER_FIRSTNAME'];
		$_SESSION["USER_STATUS"] = $result['USER_STATUS'];

		session_write_close();

		echo ("	<script>
				alert('ยินดีต้อนรับ " . $result['USER_FIRSTNAME'] . "');
				</script>");

		if ($result['USER_STATUS'] == 'ADMIN') {     
			echo ("<script = 'javascript'>window.location.href='career-advice.php';</script>");
		} elseif ($result['USER_STATUS'] == 'PROFESSOR') {
			echo ("<script = 'javascript'>window.location.href='career-advice.php';</script>");
		} elseif ($result['USER_STATUS'] == 'PERSONNEL') {
			echo ("<script = 'javascript'>window.location.href='career-advice.php';</script>");
		} elseif ($result['USER_STATUS'] == 'STUDENT') {
			echo ("<script = 'javascript'>window.location.href='career-advice.php';</script>");     
		}
	}

	mysqli_close($conn);
?>
</body>
</html>