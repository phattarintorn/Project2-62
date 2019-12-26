<?php

    include('db/db.php');

    $sql = 'SELECT * FROM MAPPING_STUDENT_DATA WHERE STUDENT_ID = ' . $_SESSION['USER_ID'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["CAREER_ID"] != 0) {
        $sql = 'SELECT * FROM MAPPING_STUDENT_PLAN WHERE STUDENT_ID = ' . $_SESSION['USER_ID'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($row["STUDENT_PLAN"] == 'GENERAL') {
            $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE WHERE STUDENT_ID = ' . $_SESSION['USER_ID'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                include('student_generate_module.php');
            } else {
                include('student_manage_module.php');
            }
        } else if ($row["STUDENT_PLAN"] == 'LIFE') {
            include('student_manage_life_module.php');
        }
    } else {
        echo ("	<script = 'javascript'>
				alert('กรุณาทำแบบทดสอบก่อนจัดแผนการเรียน')
				window.location.href='career-advice.php?career=tables_q';
			</script>
		");
    }

?>