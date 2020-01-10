<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$branch_id = $_POST["branch_id"];
$branch_initial = $_POST["branch_initial"];
$branch_name = $_POST["branch_name"];
 
$sql = "UPDATE m_branch
SET BRANCH_INITIAL = '$branch_initial',BRANCH_NAME = '$branch_name'
WHERE BRANCH_ID = '$branch_id'";
if (mysqli_query($conn, $sql)) {
    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
        window.location.href='career-advice.php?career=add_branch';</script>");
}

mysqli_close($conn);
?>