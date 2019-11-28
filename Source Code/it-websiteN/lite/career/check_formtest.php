<form action="career-advice.php?career=insert_formtestdb" method="post" enctype="multipart/form-data" class="form-horizontal">
	<?php
		include("db/db.php"); 

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$QUESTION_GROUP = $_REQUEST['QUESTION_GROUP'];

		// $sql = "SELECT * FROM question WHERE status_using =0  AND q_group = ".$q_group;
		$sql = "SELECT * FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = 0 AND QUESTION_TYPE = 'ความคิดเห็น' AND QUESTION_GROUP = " . $QUESTION_GROUP;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				include("insert_formtest1_new.php"); 
			}
		}

		$sql = "SELECT * FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = 0 AND QUESTION_TYPE = 'เปรียบเทียบ' AND QUESTION_GROUP = " . $QUESTION_GROUP;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{ 
			while($row = $result->fetch_assoc()) 
			{
				include("insert_formtest2_new.php"); 
			}
		}
	?>
	<center>
		<br>
		<button type="submit" value="submit" name="submit" class="btn btn-success">ต่อไป</button>
	</center>
	<br><br>
</form>
