<?php

    include("db/db.php");
    $conn->query("SET NAMES UTF8");

    if (isset($_REQUEST['CAREER_ID'])){
        $sql = "SELECT * FROM M_CAREER
            WHERE CAREER_ID = " . $_REQUEST["CAREER_ID"];
    } else {
        $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS MAPP
            LEFT JOIN M_CAREER AS C ON MAPP.CAREER_ID = C.CAREER_ID
            WHERE MAPP.STUDENT_ID = " . $_SESSION["USER_ID"];
    }
        
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $CAREER_ID = $row["CAREER_ID"];

            echo '<div class = "row" style = "margin: 20px;">';
            echo '<div class = "col-md-3">';
            echo '<div class = "card" style = "height: auto;" align = "center">';
            echo '<div class = "card-body" style = "padding: 15px;">';
            echo '<img style="width:auto; height:20vh; margin-bottom: 10px;" src="images/career/character/' . $row["CAREER_IMAGE"] . '">';
            echo '<br>';
            echo $row["CAREER_NAME"];
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class = "col-md-9">';
            echo '<div class = "card" align = "center">';
            echo '<div class = "card-header">';
            echo '<strong class="card-title">ชุดวิชาบังคับ</strong>';
            echo '</div>';
            echo '<div class = "row card-body" style = "padding: 20px;">';

            for ($i = 1; $i <= 3; $i++) {
                
                echo '<div class = "col-md-4">';
                echo '<div class = "card" align = "center">';

                $sql = "SELECT * FROM MAPPING_CAREER_MODULE AS CM
                    LEFT JOIN M_MODULE AS M ON CM.MODULE_ID = M.MODULE_ID
                    LEFT JOIN MAPPING_MODULE_SEMESTER AS MS ON CM.MODULE_ID = MS.MODULE_ID
                    WHERE CM.CAREER_ID = $CAREER_ID AND MODULE_SEMESTER = $i AND M.MODULE_STATUS = 0";

                $result = $conn->query($sql);
 
                echo '<div class = "card-header">';
                echo '<strong class="card-title">เทอม ' . $i . '</strong>';
                echo '</div>';
                echo '<div class = "card-body" style = "padding: 20px;">';

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<a href="career-advice.php?career=detail_module&module_id='.$row['MODULE_ID'].'">'.$row["MODULE_CODE"];
                        echo ' - ';
                        echo $row["MODULE_NAME"].'</a>';
                        echo '<br>';
                        echo '<br>';
                    }
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    if (isset($_REQUEST["CAREER_ID"])) {
        echo '<div class = "row apadding">';
        echo '<div class="col-md-1">';
        echo '<a href="javascript:history.back();">';
        echo '<button class="btn btn-secondary" style = "width: 100%;">กลับ</button></a>';
        echo '</a>';
        echo '</div>';
        echo '<div class = "col-md-8"></div>';
        echo '<div class="col-md-3">';
        echo '<button class="btn btn-secondary" id = "test" style = "width: 100%;">จัดการแผนการเรียน</button></a>';
        echo '</div>';
        echo '</div>';
    }

?>

<script>
    $(document).ready(function(){
        $('#test').on('click', function() {
            <?php
                if (isset($_REQUEST["CAREER_ID"])) {
                    $sql = "UPDATE MAPPING_STUDENT_DATA  SET CAREER_ID = " . $_REQUEST["CAREER_ID"] . " WHERE STUDENT_ID = " . $_SESSION["USER_ID"];
                    
                    if (mysqli_query($conn, $sql)) {
                        ?> 
                            window.location.href = "career-advice.php?career=student_module"
                        <?php
                    }
                }
            ?>
        })
    })
</script>