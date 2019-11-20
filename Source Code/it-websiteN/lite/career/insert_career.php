<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// $career_id = $_POST["career_id"];
$career_name = $_POST["career_name"];
$career_detail = $_POST["career_detail"];
// $career_course = $_POST["career_course"];
// $career_character = $_POST["career_character"]; 



$file_career_course = pathinfo(basename($_FILES['career_course']['name']),PATHINFO_EXTENSION);
$file_career_character = pathinfo(basename($_FILES['career_character']['name']),PATHINFO_EXTENSION);


if ($file_career_course == "" && $file_career_character == "") {
	$sql = "INSERT INTO `data_career` (`career_name`, `career_detail`) VALUES ('" .$career_name."','" .$career_detail."')";
}else{
	$new_img_name_career_course = "img_course".date("Ymdhisa").".".$file_career_course;
	$img_path_career_course = "images/career/course/";
	$uplond_path_career_course = $img_path_career_course.$new_img_name_career_course;
	$career_course = $new_img_name_career_course;

	$new_img_name_career_character = "img_character".date("Ymdhisa").".".$file_career_character;
	$img_path_career_character = "images/career/character/";
	$uplond_path_career_character = $img_path_career_character.$new_img_name_career_character;
	$career_character = $new_img_name_career_character;
	

	if ($_FILES["career_course"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if ($_FILES["career_character"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	if($file_career_course != "jpg" && $file_career_course != "png" && $file_career_course != "jpeg" && $file_career_course != "gif" && $file_career_character != "jpg" && $file_career_character != "png" && $file_career_character != "jpeg" && $file_career_character != "gif" ) 
	{		
		echo '<br>';
		echo '<br>';
		echo '<center>';
		echo "ขออภัย, กรุณาเลือกไฟล์ประเภท JPG, JPEG, PNG และ GIF เท่านั้น.";
		echo '<br>';
		echo '<br>';
		echo '<button class="btn btn-info"  data-toggle="modal" data-target="#AddCareer">เพิ่มอาชีพใหม่</button>';
		//echo '<a href="career-advice.php?career=add_career"><button class="btn btn-secondary">กลับ</button></a></a>';
		echo '</center>';

	}else{
//uplonding
		$success_career_course = move_uploaded_file($_FILES["career_course"]["tmp_name"],$uplond_path_career_course);
		if ($success_career_course == false) 
		{
			echo '<center>';
			echo "File is not an image.";
			echo '<br>';
			echo '</center>';
		} 
		
		$success_career_character = move_uploaded_file($_FILES["career_character"]["tmp_name"],$uplond_path_career_character);
		if ($success_career_character == false) 
		{
			echo '<center>';
			echo "File is not an image.";
			echo '<br>';
			echo '</center>';
		} 
		$sql = "INSERT INTO `data_career` (`career_name`, `career_detail`, `career_course`, `career_character`) VALUES ('" .$career_name."','" .$career_detail."','" .$career_course."','" .$career_character."')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=add_career';</script>");
		} 
	}

	
}

mysqli_close($conn);

?>