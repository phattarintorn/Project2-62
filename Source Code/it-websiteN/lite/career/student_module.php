<?php

    include('db/db.php');

    $sql = 'SELECT * FROM MAPPING_STUDENT_PLAN WHERE STUDENT_ID = ' . $_SESSION['USER_ID'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE WHERE STUDENT_ID = ' . $_SESSION['USER_ID'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            include('student_generate_module.php');
        } else {
            include('student_manage_module.php');
        }
    } else {
        include('student_plan.php');
    }

?>