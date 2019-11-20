 <?php
 include("db/db.php"); 


 $q_group = $_REQUEST['q_group'];
 $status_using = $_REQUEST["status_using"];

 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "UPDATE `question` SET `status_using`='" . $status_using ."' WHERE q_group=" . $q_group;

 if (mysqli_query($conn, $sql)) {
 	echo ("<script> window.location.href='career-advice.php?career=tables_q';</script>");
 } else {
 	echo "Error updating record: " . mysqli_error($conn);
 }

 mysqli_close($conn);
 ?>

