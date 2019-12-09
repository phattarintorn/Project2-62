<div class = "card">
    <div class = "card-header">
        <div class = "row">
            <div class = "col-md-9" style = "padding-top: 1vh;">
                <strong class="card-title">แผนการเรียน</strong>
            </div>
            <div class = "col-md-3">
                <a href="career-advice.php?career=student_manage_module" class="btn btn-success" style = "width:100%;">จัดการแผนการเรียน</a>
            </div>
        </div>
    </div>
    <div class = "card-body">
        <?php
            include("db/db.php");

            echo '<div class = "row" style = "margin: 20px;">';

            for ($i = 0; $i <= 3; $i++) {
                if ($i == 0) {
                    echo '<div class = "col-md-3"></div>';
                } else {
                    echo '<div class = "col-md-3"><strong class = "card-title">เทอม ' . $i . '</strong></div>';
                }
            }

            echo '</div>';
            
            for ($year = 1; $year <= 4; $year++) {
                $x = 1;
                for ($no = 1; $no <= 4; $no++) {
                    $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE AS SM
                        LEFT JOIN M_MODULE AS M ON SM.MODULE_ID = M.MODULE_ID
                        WHERE SM.STUDENT_ID = ' . $_SESSION["USER_ID"] . ' AND SM.MODULE_YEAR = ' . $year . '
                        AND SM.MODULE_NO = ' . $no;

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class = "row" style = "margin: 20px;">';
                        if ($x % 4 == 1) {
                            echo '<div class = "col-md-3"><strong class = "card-title">ปีการศึกษาที่ ' . $year . '</strong></div>';
                            $x++;
                        } else {
                            echo '<div class = "col-md-3"></div>';
                        }

                        while($row = $result->fetch_assoc()) {
                            if ($row["MODULE_ID"] == 0) {
                                echo '<div class = "col-md-3"></div>';
                            } else {
                                echo '<div class = "col-md-3">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</div>';
                            }
                        }
                        echo '</div>';
                    }
                }
            }
            
            // $x = 65;
            // for ($i = 0; $i <= 14; $i++) {
            //     echo '<div class = "row" style = "margin: 20px;">';
            //     for ($j = 0; $j <= 3; $j++) {
            //         if ($i == 0) {
            //             if ($j == 0) {
            //                 echo '<div class = "col-md-3"></div>';
            //             } else {
            //                 echo '<div class = "col-md-3"><strong class = "card-title">เทอม ' . $j . '</strong></div>';
            //             }
            //         } else if ($i%4 == 1) {
            //             if ($j == 0) {
            //                 echo '<div class = "col-md-3"><strong class = "card-title">ปีการศึกษาที่ ' . $year . '</strong></div>';
            //                 $year++;
            //             } else {
            //                 echo '<div class = "col-md-3">MODULE ' . chr($x) . '</div>';
            //                 $x++;
            //             }
            //         } else {
            //             if ($j == 0) {
            //                 echo '<div class = "col-md-3"></div>';
            //             } else {
            //                 echo '<div class = "col-md-3">MODULE ' . chr($x) . '</div>';
            //                 $x++;
            //             }
            //         }
            //     }
            //     echo '</div>';
            // }
        ?>
    </div>
</div>