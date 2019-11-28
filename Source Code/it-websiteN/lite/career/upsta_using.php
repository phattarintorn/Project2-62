 <?php
 include("db/db.php"); 


 $q_group = $_REQUEST['q_group'];
 $status_using = $_REQUEST["status_using"];

 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "UPDATE m_group_question SET QUESTION_STATUS ='" . $status_using ."' WHERE QUESTION_GROUP=" . $q_group;

 if (mysqli_query($conn, $sql)) {
 	echo ("<script> window.location.href='career-advice.php?career=tables_q';</script>");
 } else {
 	echo "Error updating record: " . mysqli_error($conn);
 }

 mysqli_close($conn);
 ?>

