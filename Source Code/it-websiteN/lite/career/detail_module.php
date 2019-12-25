<?php
    include("db/db.php");
    $conn->query("SET NAMES UTF8");

	$MODULE_ID = $_GET["module_id"];
?>
<div class = "card">
    <div class = "card-header">
        <strong class="card-title">รายละเอียดชุดวิชา</strong>
    </div>
    <div class = "row card-body" style = "padding: 20px;">
        <div class = "col-md-3">
            <div class = "card" style = "height: auto;" align = "center">
                <?php
                    $sql = "SELECT * FROM M_MODULE WHERE MODULE_ID = $MODULE_ID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class = "card-body" style = "padding: 15px;">';
                            echo '<span>ชุดวิชา</span>';
                            echo '<hr>';
                            echo '<span>';
                            echo $row["MODULE_CODE"];
                            echo '  ';
                            echo $row["MODULE_NAME"];
                            echo '</span>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class = "col-md-9">
            <div class = "card" align = "center">
                <div class = "card-header">
                    <strong class="card-title">รายวิชา</strong>
                </div>
                <div class = "row card-body" style = "padding: 20px;">
                    <?php
                            echo '<div class = "col-md-12 text-left">';
                            $sql = "SELECT * FROM mapping_module_course AS MAP
                            LEFT JOIN M_COURSE AS M ON MAP.COURSE_ID = M.COURSE_ID
                            WHERE MAP.MODULE_ID = $MODULE_ID ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<br>';
                                    echo $row["COURSE_CODE"];
                                    echo ' - ';
                                    echo $row["COURSE_NAME"];
                                    echo '<br>';
                                }
                            }
                            echo '</div>';                       
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>	
<div class="col-md-2">
	<button class="btn btn-secondary " onclick="window.location='career-advice.php?career=add_module'">กลับ</button>
</div>