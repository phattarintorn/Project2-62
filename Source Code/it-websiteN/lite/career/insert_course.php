<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];

$sql = "INSERT INTO m_course (COURSE_CODE,COURSE_NAME) VALUES ('" .$course_code."','" .$course_name."')";

if (mysqli_query($conn, $sql)) {
    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
        window.location.href='career-advice.php?career=add_course';</script>");
}
	mysqli_close($conn);

?>