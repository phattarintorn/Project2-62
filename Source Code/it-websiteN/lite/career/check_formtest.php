<form action="career-advice.php?career=insert_formtestdb" method="post" enctype="multipart/form-data" class="form-horizontal">
	<?php
	include("db/db.php"); 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$q_group = $_REQUEST['q_group'];
// $sql = "SELECT * FROM `question` WHERE `q_group`=".$q_group;
	$sql = "SELECT * FROM question WHERE status_using =0  AND q_group = ".$q_group;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while($row = $result->fetch_assoc()) 
		{ 
			$q_type = $row["q_type"];
			// echo $q_type.'<br>';

			if ($q_type == "Q1") {
				include("insert_formtest1_new.php"); 
			}  			
		}
	}

	$sql = "SELECT * FROM question WHERE status_using =0  AND q_group = ".$q_group;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while($row = $result->fetch_assoc()) 
		{ 
			$q_type = $row["q_type"]; 
			if ($q_type == "Q2") {
				include("insert_formtest2_new.php");
				// echo $q_type.'qq<br>';
			} 	
		}
	}
	?>
	<center>
		<br>
		<button type="submit" value="submit" name="submit" class="btn btn-success">ต่อไป</button>
	</center><br><br>
</form>
