<?php
    include('db/db.php');

    $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE WHERE STUDENT_ID = ' . $_SESSION["USER_ID"];
    $result = $conn->query($sql);

    for ($year = 1; $year <= 4; $year++) {
        for ($semester = 1; $semester <= 3; $semester++) {
            for($no = 1; $no <= 4; $no++) {
                $var = 'module_' . $no .'_' . $year . '_' .$semester;

                if ($result->num_rows == 0) {
                    $sql = 'INSERT INTO MAPPING_STUDENT_MODULE (STUDENT_ID, MODULE_ID, MODULE_NO, MODULE_YEAR,';
                    $sql .= ' MODULE_SEMESTER, CREATE_DATE, CREATE_BY)  VALUES (' . $_SESSION["USER_ID"] . ', ';
                    if (isset($_POST[$var])) {
                        $sql .= $_POST[$var];
                    } else {
                        $sql .= '0';
                    }
                    $sql .= ', ' . $no . ', ' . $year . ', ' . $semester . ', SYSDATE(), "SYSTEM")';

                    mysqli_query($conn, $sql);
                } else {
                    $sql = 'UPDATE MAPPING_STUDENT_MODULE SET MODULE_ID = ';
                    if (isset($_POST[$var])) {
                        $sql .= $_POST[$var];
                    } else {
                        $sql .= '0';
                    }
                    $sql .= ' WHERE STUDENT_ID = ' . $_SESSION["USER_ID"] . ' AND MODULE_NO = ' . $no . ' 
                        AND MODULE_YEAR = ' . $year . ' AND MODULE_SEMESTER = ' . $semester;

                    mysqli_query($conn, $sql);
                }
                echo '<br>';
            }
        }
    }

    echo ("<script = 'javascript'>alert('บันทึกแผนการเรียนสำเร็จ') 
				window.location.href='career-advice.php?career=student_module';</script>");
?>