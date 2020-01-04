<?php
// Create connection
include("db/db_new.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$module_code = $_POST["module_code"];
$module_name = $_POST["module_name"];
$count_course = $_POST["count_course"];
$session_name = $_SESSION["USER_USERNAME"];
$module_id = $_REQUEST["module_id"];

    $sql_name = "UPDATE m_module
    SET MODULE_CODE = '$module_code', MODULE_NAME = '$module_name' WHERE MODULE_ID = '$module_id'"; 
    if (mysqli_query($conn, $sql_name)) {
        $sql_delete = "DELETE FROM mapping_module_course WHERE MODULE_ID  = $module_id";
        $sql_delete_s = "DELETE FROM mapping_module_semester WHERE MODULE_ID  = $module_id";
        if(mysqli_query($conn,$sql_delete_s)){
            $date_s =  date('y-m-d H:i:s');
            for ($s=1; $s <= 3; $s++){
                if (isset($_POST["semester".$s])) {
                    $semester = $_POST["semester".$s];
                    $sql_s = "INSERT INTO mapping_module_semester (MODULE_ID,MODULE_SEMESTER,CREATE_DATE,CREATE_BY) VALUES
                    ('" .$module_id."','".$semester."','".$date_s."','".$session_name."')";
                    if (mysqli_query($conn, $sql_s)) {}
                }
            }
        }
        if(mysqli_query($conn,$sql_delete)){
            $date =  date('y-m-d H:i:s');
            for ($i=1; $i <= $count_course; $i++){
                if (isset($_POST["choice_course".$i])) {
                    $course_id = $_POST["choice_course".$i];
                    $sql_m = "INSERT INTO mapping_module_course (MODULE_ID,COURSE_ID,CREATE_DATE,CREATE_BY) VALUES
                    ('" .$module_id."','".$course_id."','".$date."','" .$session_name."')";
                    if (mysqli_query($conn, $sql_m)) {
                        echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
                        window.location.href='career-advice.php?career=detail_module&module_id=".$module_id."';</script>");
                    }
                }else{
                    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
                    window.location.href='career-advice.php?career=detail_module&module_id=".$module_id."';</script>");
                }
            }
        }
    }

    mysqli_close($conn);

?>