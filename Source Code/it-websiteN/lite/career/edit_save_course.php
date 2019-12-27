<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$course_id = $_POST["course_id"];
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
 
$sql = "UPDATE m_course
SET COURSE_CODE = '$course_code',COURSE_NAME = '$course_name'
WHERE COURSE_ID = '$course_id'";
if (mysqli_query($conn, $sql)) {
    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
        window.location.href='career-advice.php?career=add_course';</script>");
}

mysqli_close($conn);
?>