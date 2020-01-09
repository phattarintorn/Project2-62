<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$group_id = $_POST["group_id"];
$group_name = $_POST["group_name"];

 
$sql = "UPDATE m_group_question
SET QUESTION_GROUP_NAME = '$group_name'
WHERE QUESTION_GROUP = '$group_id'";
if (mysqli_query($conn, $sql)) {
    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
        window.location.href='career-advice.php?career=tables_q';</script>");
}

mysqli_close($conn);
?>