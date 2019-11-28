<?php


include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$q_id = $_REQUEST['id']; 

$sql = "SELECT * FROM `m_group_question` WHERE QUESTION_ID =".$q_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{
		$q_type = $row["QUESTION_TYPE"];
		// echo $q_type ;
		if ($q_type == "ความคิดเห็น") { 
			include("edit_detail_q1.php"); 

		}
		if ($q_type == "เปรียบเทียบ") { 
			include("edit_detail_q2.php"); 
		}
	 
	}
}	
?>