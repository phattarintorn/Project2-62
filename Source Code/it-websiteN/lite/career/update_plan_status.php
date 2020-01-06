<?php
include("db/db.php");
$id = $_REQUEST['id'];

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['btncancel'])) {
    $sql = "UPDATE MAPPING_STUDENT_MODULE AS M
        INNER JOIN MAPPING_STUDENT_PLAN AS P
        ON P.STUDENT_ID = M.STUDENT_ID
        SET PLAN_STATUS = 0
        WHERE M.STUDENT_ID =" . $id;

    if (mysqli_query($conn, $sql)) {
        echo ("<script = 'javascript'>alert('อัพเดตสถานะแผนการเรียนสำเร็จ') 
                window.location.href='career-advice.php?career=student_professor';</script>");
    } else {
        echo ("<script = 'javascript'>alert('อัพเดตสถานะแผนการเรียนไม่สำเร็จ' . mysqli_error($conn) ) 
                window.location.href='career-advice.php?career=student_professor';</script>");
    }
} else {
    $sql = "UPDATE MAPPING_STUDENT_MODULE AS M
    INNER JOIN MAPPING_STUDENT_PLAN AS P
    ON P.STUDENT_ID = M.STUDENT_ID
    SET PLAN_STATUS = 1
    WHERE M.STUDENT_ID =" . $id;

    if (mysqli_query($conn, $sql)) {
        echo ("<script = 'javascript'>alert('อัพเดตสถานะแผนการเรียนสำเร็จ') 
            window.location.href='career-advice.php?career=student_professor';</script>");
    } else {
        echo ("<script = 'javascript'>alert('อัพเดตสถานะแผนการเรียนไม่สำเร็จ' . mysqli_error($conn) ) 
            window.location.href='career-advice.php?career=student_professor';</script>");
    }
}
mysqli_close($conn);
