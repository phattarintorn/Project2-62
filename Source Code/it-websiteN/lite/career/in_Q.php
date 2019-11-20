<?php


include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$q_id = $_REQUEST['id']; 

$sql = "SELECT * FROM `question` WHERE `q_id`=".$q_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{
		$q_type = $row["q_type"];
		// echo $q_type ;
		if ($q_type == "Q1") { 
			include("edit_detail_q1.php"); 

		}
		if ($q_type == "Q2") { 
			include("edit_detail_q2.php"); 
		}
		if ($q_type == "Q3") { 

			include("edit_detail_q3.php"); 

		}
		if ($q_type == "Q4") { 
			include("edit_detail_q4.php"); 

		}else{
		} 
	}
}	
?>