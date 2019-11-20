<?php
// Create connection
if(isset($_SESSION["status"])){
	if ($_SESSION["status"] == "admin") {
		include("body/db.php"); 

		$user_id = $_POST["user_id"];
		$skills_detail = $_POST["skills_detail"]; 

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		 $sql = "UPDATE `skills` SET `skills_detail`='" . $skills_detail ."' WHERE skills_id";

	}else{
		include("body/db_new.php"); 

		$user_id = $_POST["user_id"];
		$skills_score = implode(",",$_POST["skills_score"]); 
	// echo "<br>".$user_id."<br>";
	// echo "<br>".$skills_score."<br>";

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "INSERT INTO `test_form`( `user_id`, `skills_score`) VALUES ('" .$user_id."','" .$skills_score."')";
	}
}

if (mysqli_query($conn, $sql)) {
	echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
		window.location.href='career-advice.php?career=page1';</script>");
} else {
	echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php?career=page1';</script>");
}

mysqli_close($conn);


//echo "Connected successfully";


?>