<div class="col-md-12">
	<div class="card-header">
		<center>
			<strong class="card-title">
				<h2>กำหนดตัวแปรคำถามแบบสอบถาม</h2>
			</strong> 
		</center> 
	</div>
	<br><br>

	<?php
	include("db/db.php"); 

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$q_group = $_REQUEST['q_group']; 
	$sql = "SELECT * FROM m_group_question AS Mq WHERE Mq.QUESTION_ID AND Mq.QUESTION_GROUP =".$q_group;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while($row = $result->fetch_assoc()) 
		{ 
			$q_type = $row["QUESTION_TYPE"];

			if ($q_type == "ความคิดเห็น") {
				include("result_q1.php");
			} 					
		}
	}
	echo "<hr><br>";
	$q_group = $_REQUEST['q_group']; 
	$sql = "SELECT * FROM m_group_question AS Mq WHERE Mq.QUESTION_ID AND Mq.QUESTION_GROUP =".$q_group;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while($row = $result->fetch_assoc()) 
		{ 
			$q_type = $row["QUESTION_TYPE"];
			if ($q_type == "เปรียบเทียบ") { 
				include("result_q2.php");  
			} 					
		}
	} 
	?>
	<center> 
		<a href="career-advice.php?career=check_Qresult2&q_group=<?php echo $q_group ?>">
			<button class="btn btn-danger" id="nextPage">ต่อไป</i></button></a>
		</a>
	</center> 
</div> 
