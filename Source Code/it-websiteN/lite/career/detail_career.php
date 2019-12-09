<?php
    include("db/db.php");
    $conn->query("SET NAMES UTF8");

	$CAREER_ID = $_GET["career_id"];
?>
<div class = "card">
    <div class = "card-header">
        <strong class="card-title">รายละเอียดอาชีพ</strong>
    </div>
    <div class = "row card-body" style = "padding: 20px;">
        <div class = "col-md-3">
            <div class = "card" style = "height: auto;" align = "center">
                <?php
                    $sql = "SELECT * FROM M_CAREER WHERE CAREER_ID = $CAREER_ID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class = "card-body" style = "padding: 15px;">';
                            echo '<img style="width:35%; height:45%; margin-bottom: 10px;" src="images/career/character/' . $row["CAREER_IMAGE"] . '">';
                            echo '<br>';
                            echo $row["CAREER_NAME"];
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class = "col-md-9">
            <div class = "card" align = "center">
                <div class = "card-header">
                    <strong class="card-title">Module</strong>
                </div>
                <div class = "row card-body" style = "padding: 20px;">
                    <?php
                            echo '<div class = "col-md-12 text-left">';
                            $sql = "SELECT * FROM MAPPING_CAREER_MODULE AS MAPP
                            LEFT JOIN M_MODULE AS M ON MAPP.MODULE_ID = M.MODULE_ID
                            WHERE MAPP.CAREER_ID = $CAREER_ID ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<br>';
                                    echo $row["MODULE_CODE"];
                                    echo ' - ';
                                    echo $row["MODULE_NAME"];
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
	<button class="btn btn-secondary " onclick="window.location='career-advice.php?career=add_career'">กลับ</button>
</div>