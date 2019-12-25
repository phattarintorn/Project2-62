<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$career_name = $_POST["career_name"];
$count_career = $_POST["count_career"];
$session_name = $_SESSION["USER_USERNAME"];

$file_career_character = pathinfo(basename($_FILES['career_character']['name']),PATHINFO_EXTENSION);

if ($file_career_character == "") {
	$sql = "INSERT INTO m_career (CAREER_NAME) VALUES ('".$career_name."')";
}else{

	$new_img_name_career_character = "img_character".date("Ymdhisa").".".$file_career_character;
	$img_path_career_character = "images/career/character/";
	$uplond_path_career_character = $img_path_career_character.$new_img_name_career_character;
	$career_character = $new_img_name_career_character;
	
	if ($_FILES["career_character"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	if($file_career_character != "jpg" && $file_career_character != "png" && $file_career_character != "jpeg" && $file_career_character != "gif" ) 
	{		
		echo '<br>';
		echo '<br>';
		echo '<center>';
		echo "ขออภัย, กรุณาเลือกไฟล์ประเภท JPG, JPEG, PNG และ GIF เท่านั้น.";
		echo '<br>';
		echo '<br>';
		echo '<button class="btn btn-info"  data-toggle="modal" data-target="#AddCareer">เพิ่มอาชีพใหม่</button>';
		echo '</center>';

	}else{
//uplonding
		$success_career_character = move_uploaded_file($_FILES["career_character"]["tmp_name"],$uplond_path_career_character);
		if ($success_career_character == false) 
		{
			echo '<center>';
			echo "File is not an image.";
			echo '<br>';
			echo '</center>';
		} 

		$sql = "INSERT INTO m_career (CAREER_NAME,CAREER_IMAGE) VALUES ('" .$career_name."','" .$career_character."')";

		if (mysqli_query($conn, $sql)) {
			$career_id = $conn->insert_id;
			$date =  date('y-m-d H:i:s');
			//printf($career_id);
			for ($i=1; $i <= $count_career; $i++){
				if (isset($_POST["choice_module".$i])) {
					$module_id = $_POST["choice_module".$i];
					$sql_m = "INSERT INTO mapping_career_module (CAREER_ID,MODULE_ID,CREATE_DATE,CREATE_BY) VALUES
					 ('" .$career_id."','".$module_id."','".$date."','" .$session_name."')";
					if (mysqli_query($conn, $sql_m)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=add_career';</script>");
					}
				}
			}
		}
	}

}

	mysqli_close($conn);

?>