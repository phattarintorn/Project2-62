<?php
    include('../db/db.php');
    // include('db/db.php');

    $sql = "SELECT * FROM MAPPING_MODULE_SEMESTER AS MS
        LEFT JOIN M_MODULE AS M ON MS.MODULE_ID = M.MODULE_ID";

    $result = $conn->query($sql);

    if ( $result->num_rows > 0 ) {
        while( $row = $result->fetch_array() ) {
            $data_arr[] = array(
                "id" => $row["MODULE_ID"],
                "code" => $row["MODULE_CODE"],
                "name" => $row["MODULE_NAME"],
                "semester" => $row["MODULE_SEMESTER"]
            );
            // echo '<option value = "' . $row["MODULE_ID"] . '">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</option>';
        }

        // Encoding array in JSON format
        echo json_encode($data_arr);
    }

?>