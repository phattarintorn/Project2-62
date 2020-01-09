<!-- insert_Qside -->
<?php

include("db/db.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$line = $_POST["hdnLine"];

for($i=1; $i<$line; $i++)
{
	if($_POST["q_side$i"] != "")
	{
		
		$session_name = $_SESSION["USER_USERNAME"];
		$q_part = $_POST["q_side$i"];//ด้าน
		$q_type = $_POST["q_type$i"];//เปรียบเทียบ
		$q_group = $_POST["q_group$i"];
		$q_choise = $_POST["q_no$i"];
		$q_day = $_POST["q_day"];
		$q_group_name = $_POST["group_name"];
		if($q_type == 'ความคิดเห็น'){
			$choose_no = '5';
		}else{
			$choose_no = '2';
		}
		$sql = "INSERT INTO m_group_question(QUESTION_GROUP,QUESTION_GROUP_NAME,QUESTION_CHOICE,QUESTION_PART,QUESTION_TYPE,QUESTION_CHOOSE,CREATE_DATE,CREATE_BY,UPDATE_DATE,UPDATE_BY) 
		VALUES ('".$q_group."','".$q_group_name."','".$q_choise."','".$q_part."','".$q_type."','".$choose_no."','".$q_day."','".$session_name."','".$q_day."','".$session_name."')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=insert_Qtopics_type&q_day=".$q_day."';</script>");
		} else {
			echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
		}
	}
}
mysqli_close($conn);

?>


