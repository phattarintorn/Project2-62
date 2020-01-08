<?php

// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$module_code = $_POST["module_code"];
$module_name = $_POST["module_name"];
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
        echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
            window.location.href='career-advice.php?career=edit_module&module_id=".$module_id."';</script>");
}
	mysqli_close($conn);

?>