<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$module_code = $_POST["module_code"];
$module_name = $_POST["module_name"];
$count = $_POST["count"];
$session_name = $_SESSION["USER_USERNAME"];

$sql = "INSERT INTO m_module (MODULE_CODE,MODULE_NAME) VALUES ('" .$module_code."','" .$module_name."')";

if (mysqli_query($conn, $sql)) {
    $module_id = $conn->insert_id;
    for($j=1; $j <=3 ; $j++){
        if (isset($_POST["semester".$j])) {
            $semester = $_POST["semester".$j];
            $dateTime =  date('y-m-d H:i:s');
            $sql_s = "INSERT INTO mapping_module_semester (MODULE_ID,MODULE_SEMESTER,CREATE_DATE,CREATE_BY) VALUES
                    ('" .$module_id."','".$semester."','".$dateTime."','".$session_name."')";
            if(mysqli_query($conn, $sql_s)){
            }     
        }
    }

    if($count!=0){
        for ($i=0; $i < $count; $i++){
            if (isset($_POST["course_code".$i]) && isset($_POST["course_name".$i])) {
                $course_code = $_POST["course_code".$i];
                $course_name = $_POST["course_name".$i];
                $sql_c = "INSERT INTO m_course (COURSE_CODE,COURSE_NAME) VALUES
                    ('" .$course_code."','".$course_name."')";
                if (mysqli_query($conn, $sql_c)) {
                    $course_id = $conn->insert_id;
                    $date =  date('y-m-d H:i:s');
                    $sql_map = "INSERT INTO mapping_module_course (MODULE_ID,COURSE_ID,CREATE_DATE,CREATE_BY) VALUES
                    ('" .$module_id."','".$course_id."','".$date."','".$session_name."')";
                    if(mysqli_query($conn, $sql_map)){
                        echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
                            window.location.href='career-advice.php?career=add_module';</script>");
                    }
                }
            }
        }
    }
    else{
        echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
            window.location.href='career-advice.php?career=add_module';</script>");
    }    
}
	mysqli_close($conn);

?>