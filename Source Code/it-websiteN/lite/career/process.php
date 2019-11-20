<?php
include("db/db_new.php");

$user_id = $_SESSION["id"];
$form_date = $_REQUEST['form_date'];
if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
	$q_id = $_REQUEST['q_id']; 

	$sql = "SELECT COUNT(form_id) AS count, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`choice_form`) AS sum FROM test_form WHERE `q_id` = '$q_id' GROUP BY `career` ORDER BY `sum` DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$i = 0;
		$top_score = 0;
		$total_score = 0;
		while($row = $result->fetch_assoc()) 
		{  
			$i = $i +1;   
			$form_side = $row['form_side'];
			$form_type = $row['form_type'];
			
			// $h = 5*$row["count"];
			// echo "<br><br>".$row['career'].'--->เต็ม '.$h;
			// echo '<br>จำนวนข้อ '.$row["count"];
			// echo '<br>คะแนน '.$row["sum"];
			
			// $sum_career = (5*$row["count"]); 
			
			// echo '<br>'.$i.'---'.$top_score;
			
			if ($i <= "5") {

				// echo "<br>top_score = ".$top_score."=".$top_score."+".$row["sum"]."<br>";
				$top_score = $top_score +  $row["sum"];

			} 

			// echo "<br>total_score = ".$total_score."=".$total_score."+".$sum_career."<br>";
			$total_score = $total_score +  $row["sum"];

			$sql = "INSERT INTO `sum_form`( `q_id`, `user_id`, `degree`, `career`, `raw_score` ,`group`,`date`,`side`,`type`) 
			VALUES ('".$q_id."','".$user_id."','".$i."','".$row['career']."','".$row['sum']."', '".$row['form_group']."','".$form_date."','".$form_side."','".$row['form_type']."')"; 
			mysqli_query($conn, $sql);

		}
		// echo '<br>TOP 5 = '.$top_score;	 
		// echo '<br>Total = '.$total_score.'<br><br><hr>';	 


		$sql = "UPDATE `sum_form`  SET `total_score`='".$total_score."',`top_score`='".$top_score."' WHERE q_id= '$q_id' AND `date` = '$form_date'";
		mysqli_query($conn, $sql);

	}
	$q_id2 = $_REQUEST['q_id2']; 
// echo date('y-m-d H:i:s');
// echo $form_date;  
// echo 'user_id= '.$user_id.'<br>';  
// echo 'q_id= '.$q_id.'<br>';  
// echo "<hr/>"; 

	$sql = "SELECT COUNT(form_id) AS count2, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`q2_raw_score`) AS sum2 FROM test_form WHERE `q_id` = '$q_id2' GROUP BY `career` ORDER BY `sum2` DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$i2 = 0;
		$top_score2 = 0;
		$total_score2 = 0;
		while($row = $result->fetch_assoc()) 
		{  
			$i2 = $i2 +1;   
			$form_side2 = $row['form_side'];
			$form_type2 = $row['form_type'];

			// $h = 1*$row["count2"];
			// echo "<br><br>".$row['career'].'--->'.$h;
			// echo '<br>จำนวนข้อ'.$row["count2"];
			// echo '<br>คะแนน '.$row["sum2"];
			// echo '<br>อาชีพ '.$row["career"];
			
			// $sum_career2 = $row["count2"]; 
			
			// echo '<br>'.$i2.'---'.$top_score2;
			if ($i <= "5") {
				// echo "<br>top_score2 = ".$top_score2."=".$top_score2."+".$row["sum2"]."<br><br>";
				$top_score2 = $top_score2 +  $row["sum2"];


			} 

			// echo "<br>total_score2 = ".$total_score2."=".$total_score2."+".$sum_career2."<br>";
			$total_score2 = $total_score2 +  $row["sum2"];

			$sql = "INSERT INTO `sum_form`( `q_id`, `user_id`, `degree`, `career`, `raw_score` ,`group`,`date`,`side`,`type`) 
			VALUES ('".$q_id2."','".$user_id."','".$i2."','".$row['career']."','".$row['sum2']."', '".$row['form_group']."','".$form_date."','".$form_side2."','".$row['form_type']."')"; 
			mysqli_query($conn, $sql);

		}
		// echo '<br><br>TOP 5 = '.$top_score2;	 
		// echo '<br>Total2 = '.$total_score2.'<br><br><hr>';	 



		$sql = "UPDATE `sum_form`  SET `total_score`='".$total_score2."',`top_score`='".$top_score2."' WHERE q_id= '$q_id2' AND `date` = '$form_date'";
		mysqli_query($conn, $sql);

	}
	if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
			window.location.href='career-advice.php?career=action&q_id=".$q_id."&q_id2=".$q_id2."&form_date=".$form_date."&form_type=".$form_type."&form_type2=".$form_type2."&form_side=".$form_side."&form_side2=".$form_side2."';</script>");
	}
}


if (isset($_REQUEST["q_id"])  && !isset($_REQUEST["q_id2"])) {
	$q_id = $_REQUEST['q_id']; 

	$sql = "SELECT COUNT(form_id) AS count, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`choice_form`) AS sum FROM test_form WHERE `q_id` = '$q_id' GROUP BY `career` ORDER BY `sum` DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$i = 0;
		$top_score = 0;
		$total_score = 0;
		while($row = $result->fetch_assoc()) 
		{  
			$i = $i +1;   
			$form_side = $row['form_side'];
			$form_type = $row['form_type'];
		// $h = 5*$row["count"];
		// echo "<br><br>".$row['career'].'--->'.$h;
		// echo '<br>จำนวนข้อ'.$row["count"];
		// echo '<br>คะแนน '.$row["sum"];
			// $sum_career = $row['sum'] / (5*$row["count"]) *100; 
		// echo '<br>'.$i.'---'.$top_score;
			if ($i <= "5") {
				$top_score = $top_score +  $row["sum"];
			// echo "<br>top_score = ".$top_score."=".$top_score."+".$row["sum"]."<br>";

			} 

			$total_score = $total_score +  $row["sum"];
		// echo "<br>total_score = ".$total_score."=".$total_score."+".$sum_career."<br>";
			$sql = "INSERT INTO `sum_form`( `q_id`, `user_id`, `degree`, `career`, `raw_score` ,`group`,`date`,`side`,`type`) 
			VALUES ('".$q_id."','".$user_id."','".$i."','".$row['career']."','".$row['sum']."', '".$row['form_group']."','".$form_date."','".$row['form_side']."','".$row['form_type']."')"; 
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=action&q_id=".$q_id."&form_date=".$form_date."&form_type=".$form_type."&form_side=".$form_side."';</script>");
			}  
		}
	// echo '<br>TOP 5 = '.$top_score;	 
	// echo '<br>Total = '.$total_score;	 


		$sql = "UPDATE `sum_form`  SET `total_score`='".$total_score."',`top_score`='".$top_score."' WHERE q_id= '$q_id' AND `date` = '$form_date'";
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&q_id=".$q_id."&form_date=".$form_date."&form_type=".$form_type."&form_side=".$form_side."';</script>");
		} 
	}
}




if (isset($_REQUEST["q_id2"])  && !isset($_REQUEST["q_id"])) {

	$q_id2 = $_REQUEST['q_id2']; 
// echo date('y-m-d H:i:s');
// echo $form_date;  
// echo 'user_id= '.$user_id.'<br>';  
// echo 'q_id= '.$q_id.'<br>';  
// echo "<hr/>"; 

	$sql = "SELECT COUNT(form_id) AS count, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`q2_raw_score`) AS sum FROM test_form WHERE `q_id` = '$q_id2' GROUP BY `career` ORDER BY `sum` DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$i = 0;
		$top_score = 0;
		$total_score = 0;
		while($row = $result->fetch_assoc()) 
		{  
			$i = $i +1;   
			$form_side2 = $row['form_side'];
			$form_type2 = $row['form_type'];
		// $h = 1*$row["count"];
		// echo "<br><br>".$row['career'].'--->'.$h;
		// echo '<br>จำนวนข้อ'.$row["count"];
		// echo '<br>คะแนน '.$row["sum"];
		// echo '<br>อาชีพ '.$row["career"];
			// $sum_career = $row['sum'] / $row["count"] *100; 
		// echo '<br>'.$i.'---'.$top_score;
			if ($i <= "5") {
			// echo "<br>top_score = ".$top_score."=".$top_score."+".$row["sum"]."<br><br><hr>";
				$top_score = $top_score +  $row["sum"];


			} 

		// echo "<br>total_score = ".$total_score."=".$total_score."+".$sum_career."<br>";
			$total_score = $total_score +  $row["sum"];

			$sql = "INSERT INTO `sum_form`( `q_id`, `user_id`, `degree`, `career`, `raw_score` ,`group`,`date`,`side`,`type`) 
			VALUES ('".$q_id."','".$user_id."','".$i."','".$row['career']."','".$row['sum']."', '".$row['form_group']."','".$form_date."','".$row['form_side']."','".$row['form_type']."')"; 
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=action&q_id2=".$q_id2."&form_date=".$form_date."&form_type2=".$form_type2."&form_side2=".$form_side2."';</script>");
			}  
		}
	// echo '<br><hr><br>TOP 5 = '.$top_score;	 
	// echo '<br>Total = '.$total_score;	 


		$sql = "UPDATE `sum_form`  SET `total_score`='".$total_score."',`top_score`='".$top_score."' WHERE q_id =  '$q_id' AND `date` = '$form_date2'";
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&q_id2=".$q_id2."&form_date=".$form_date."&form_type2=".$form_type2."&form_side2=".$form_side2."';</script>");
		} 

	}
} 