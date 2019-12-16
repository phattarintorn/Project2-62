<?php
    include('../db/db.php');

    $sql = "SELECT * FROM MAPPING_MODULE_SEMESTER AS MS
        LEFT JOIN M_MODULE AS M ON MS.MODULE_ID = M.MODULE_ID";
        // WHERE MS.MODULE_SEMESTER = " . $_POST["id"];

    $result = $conn->query($sql);

    if ( $result->num_rows > 0 ) {
        while( $row = $result->fetch_array() ) {
            $data_arr[] = array(
                "MODULE_ID" => $row["MODULE_ID"],
                "MODULE_CODE" => $row["MODULE_CODE"],
                "MODULE_NAME" => $row["MODULE_NAME"]
            );
            // echo '<option value = "' . $row["MODULE_ID"] . '">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</option>';
        }

        // Encoding array in JSON format
        echo json_encode($data_arr);
    }

?>