<?php
    include("db/db.php");
    $conn->query("SET NAMES UTF8");

    $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS MAPP
        LEFT JOIN M_CAREER AS C ON MAPP.CAREER_ID = C.CAREER_ID
        WHERE MAPP.STUDENT_ID = " . $_SESSION["USER_ID"];
        
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $CAREER_ID = $row["CAREER_ID"];

            ?>

            <div class = "card">
                <div class = "card-header">
                    <strong class="card-title">แผนการเรียน</strong>
                </div>
                <div class = "card-body">
                    <div class = "row" style = "margin: 20px;">
                        <div class = "col-md-3">
                            <div class = "card" style = "height: auto;" align = "center">
                                <div class = "card-body" style = "padding: 15px;">
                                    <img style="width:auto; height:20vh; margin-bottom: 10px;" src="images/career/character/<?php echo $row["CAREER_IMAGE"] ?>">
                                    <br>
                                    <?php echo $row["CAREER_NAME"] ?>
                                </div>
                            </div>
                        </div>
                        <div class = "col-md-9">
                            <div class = "card" align = "center">
                                <div class = "card-header">
                                    <strong class="card-title">แผนการเรียน</strong>
                                </div>
                                <div class = "row card-body" style = "padding: 20px;">
                                    <?php
                                        for ( $i = 1; $i <= 3; $i++ ) {
                                            echo '<div class = "col-md-4">';
                                            echo '<div class = "card" align = "center">';

                                            $sql = "SELECT * FROM MAPPING_CAREER_MODULE AS MAPP
                                                LEFT JOIN M_MODULE AS M ON MAPP.MODULE_ID = M.MODULE_ID
                                                LEFT JOIN MAPPING_MODULE_SEMESTER AS S ON MAPP.MODULE_ID = S.MODULE_ID
                                                WHERE MAPP.CAREER_ID = $CAREER_ID AND MODULE_SEMESTER = $i";

                                            $result = $conn->query($sql);

                                            echo '<div class = "card-header">';
                                            echo '<strong class="card-title">เทอม ' . $i . '</strong>';
                                            echo '</div>';
                                            echo '<div class = "card-body" style = "padding: 20px;">';

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo $row["MODULE_CODE"];
                                                    echo ' - ';
                                                    echo $row["MODULE_NAME"];
                                                    echo '<br>';
                                                    echo '<br>';
                                                }
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row" style = "margin: 20px;">
                        <div class = "card" style = "width: 100vw;">
                            <div class = "card-body">
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <strong class = "card-title">เทอม 1</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <strong class = "card-title">เทอม 2</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <strong class = "card-title">เทอม 3</strong>
                                    </div>
                                </div>

                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                        <strong class = "card-title">ปีการศึกษา 1</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <select class="form-control" id = "module_1_1_1" required>
                                            <?php include('student_select_module.php'); ?>
                                        </select>
                                    </div>
                                    <div class = "col-md-3">
                                        <select class="form-control" id = "module_1_1_2" required>
                                            <option value = "1">Information Technology Foundation Module</option>
                                        </select>
                                    </div>
                                    <div class = "col-md-3">
                                        <select class="form-control" id = "module_1_1_3" required>
                                            <option value = "0">English for communication I</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_2_1_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_2_1_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_2_1_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_3_1_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_3_1_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_3_1_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" class="form-control" id = "module_4_1_1"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_4_1_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" class="form-control" id = "module_4_1_3"/>
                                    </div>
                                </div>

                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                        <strong class = "card-title">ปีการศึกษา 2</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_2_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_2_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_2_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_2_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_2_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_2_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_3_2_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_3_2_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_3_2_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_4_2_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_4_2_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_2_3"/> -->
                                    </div>
                                </div>
                                
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                        <strong class = "card-title">ปีการศึกษา 3</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_3_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_3_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_3_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_3_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_3_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_3_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_3_3_1"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_3_3_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_3_3_3"/>
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_3_1"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_3_2"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_4_3_3"/>
                                    </div>
                                </div>
                                                                
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                        <strong class = "card-title">ปีการศึกษา 4</strong>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_4_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_1_4_2"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_1_4_3"/> -->
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <input type = "text" id = "module_2_4_1"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_2_4_2"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_2_4_3"/> -->
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_3_4_1"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_3_4_2"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_3_4_3"/> -->
                                    </div>
                                </div>
                                <div class = "row" style = "margin: 20px;">
                                    <div class = "col-md-3">
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_4_1"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_4_2"/> -->
                                    </div>
                                    <div class = "col-md-3">
                                        <!-- <input type = "text" id = "module_4_4_3"/> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>