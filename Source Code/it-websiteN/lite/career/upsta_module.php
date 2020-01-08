<?php
 include("db/db.php"); 


 $MODULE_ID = $_REQUEST['module_id'];
 $status_using = $_REQUEST["status_using"];

 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "UPDATE m_module SET MODULE_STATUS ='" . $status_using ."' WHERE MODULE_ID=" . $MODULE_ID;

 if (mysqli_query($conn, $sql)) {
 	echo ("<script> window.location.href='career-advice.php?career=add_module';</script>");
 } else {
 	echo "Error updating record: " . mysqli_error($conn);
 }

 mysqli_close($conn);
 ?>
