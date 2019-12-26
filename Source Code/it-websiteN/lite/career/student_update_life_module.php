<?php
    include('db/db.php');

    $sql = 'INSERT INTO MAPPING_LIFE_MODULE (STUDENT_ID, MODULE_ID, CREATE_DATE, CREATE_BY)
        VALUE (' . $_SESSION["USER_ID"] . ', ' . $_POST["module"] . ', SYSDATE(), "SYSTEM")';

    if (mysqli_query($conn, $sql)) {
        echo ("<script = 'javascript'>alert('บันทึกแผนการเรียนสำเร็จ') 
        window.location.href='career-advice.php?career=student_module';</script>");
    } else {
        echo ("<script = 'javascript'>alert('บันทึกแผนการไม่เรียนสำเร็จ กรุณาตรวจสอบอีกครั้ง') 
        window.location.href='javascript:history.back()';</script>");
    }

?>