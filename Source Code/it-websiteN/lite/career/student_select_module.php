<?php
    include('db/db.php');

    $sql = "SELECT * FROM MAPPING_MODULE_SEMESTER AS MS
        LEFT JOIN M_MODULE AS M ON MS.MODULE_ID = M.MODULE_ID";
        // WHERE MS.MODULE_SEMESTER = 1 ";

    $result = $conn->query($sql);

    if ( $result->num_rows > 0 ) {
        while( $row = $result->fetch_array() ) {
            echo '<option value = "' . $row["MODULE_ID"] . '">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</option>';
        }
    }

?>