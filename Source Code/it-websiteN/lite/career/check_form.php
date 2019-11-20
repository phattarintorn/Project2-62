<?php


include("db/db.php"); 

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$q_group = $_REQUEST['q_group']; 

$sql = "SELECT * FROM `test_form` WHERE `form_group` ='$q_group'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{ 
		if ($row["form_type"] == "Q1") {
			include("history_formtest1.php");
		}
	}
}

$q_group = $_REQUEST['q_group'];

$sql = "SELECT * FROM `test_form` WHERE `form_group` ='$q_group'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{ 
		if ($row["form_type"] == "Q2") {
			include("history_formtest2.php");
		}
	}
}
?> 

<div class="col-md-2"> 
	<a href="career-advice.php?career=tables_history2&q_group=<?php echo $q_group ?>">
		<button class="btn btn-secondary">กลับ</i></button></a>
	</a> 
</div>