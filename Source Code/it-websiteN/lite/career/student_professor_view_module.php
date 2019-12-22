<?php
include("db/db.php");
$id = $_REQUEST['id'];
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9" style="padding-top: 1vh;">
                <strong class="card-title">แผนการเรียน</strong>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="career-advice.php?career=update_plan_status" method="post" enctype="multipart/form-data"
            class="form-horizontal" id="status_plan">
        <?php
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
                        WHERE SM.STUDENT_ID = ' . $id . ' AND SM.MODULE_YEAR = ' . $year . '
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

                    while ($row = $result->fetch_assoc()) {
                        if ($row["MODULE_ID"] == 0) {
                            echo '<div class = "col-md-3"></div>';
                        } else {
                            echo '<input type="hidden" id="id" name="id" value="' . $row["STUDENT_ID"] . '">';
                            echo '<div class = "col-md-3">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</div>';
                        }
                    }
                    echo '</div>';
                }
            }
        }
        ?>
        </form>
    </div>
    <center>
        <button type="submit" class="btn btn-danger">ไม่ผ่าน</button>
        <button type="submit" form="status_plan" class="btn btn-success">ผ่าน</button>
    </center>
    <br>
</div>