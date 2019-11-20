<?php


include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$q_id = $_POST['q_id'];

$sql = "SELECT * FROM `question` WHERE `q_id`=".$q_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{
		$q_type = $row["q_type"];
		if ($q_type == "Q1") { 
			include("result_q1.php"); 

		}elseif ($q_type == "Q2") { 
			include("result_q2.php"); 

		}elseif ($q_type == "Q3") { 

			include("result_q3.php"); 

		}elseif ($q_type == "Q4") { 
			include("result_q4.php"); 

		}else{
		} 
	}
}	
?>