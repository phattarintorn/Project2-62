<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$branch_initial = $_POST["branch_initial"];
$branch_name = $_POST["branch_name"];
            $sql = "INSERT INTO m_branch (BRANCH_INITIAL,BRANCH_NAME) VALUES
                ('" .$branch_initial."','".$branch_name."')";
            if (mysqli_query($conn, $sql)) {
                echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
                window.location.href='career-advice.php?career=add_branch';</script>");
            }

	mysqli_close($conn);

?>