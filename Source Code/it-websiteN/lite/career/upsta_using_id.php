 <?php
 include("db/db.php"); 


 $id = $_REQUEST['id'];
 $status_using = $_REQUEST["status_using"];

 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "UPDATE `question` SET `status_using`='" . $status_using ."' WHERE q_id=" . $id;

 if (mysqli_query($conn, $sql)) {
 	echo ("<script> window.location.href='career-advice.php?career=in_Qgroup&q_group=".$id."';</script>");
 } else {
 	echo "Error updating record: " . mysqli_error($conn);
 }

 mysqli_close($conn);
 ?>

