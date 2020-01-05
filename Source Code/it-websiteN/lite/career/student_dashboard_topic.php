<div class = "row">
    <!-- all question -->
    <div class = "col-md-6">
    <div class="alert  alert-info alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-info">แบบสอบถามทั้งหมด</span></h3>
        <?php
            $sql = "SELECT * FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = 0 GROUP BY QUESTION_GROUP";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $count = 0;
                while($row = $result->fetch_assoc()) {
                    $count = $count +1;
                }
            } 
        ?>
        <h1>
            <?php echo $count ?>
        </h1>
        <hr>
        <a href="career-advice.php?career=tables_q">
            ทำแบบสอบถาม
        </a>
        </center>
    </div>
    </div>

    <!-- last question -->
    <div class = "col-md-6">
    <?php
        $sql = "SELECT * FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = 0 
        GROUP BY QUESTION_GROUP ORDER BY CREATE_DATE DESC LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {  
        while ($row = $result->fetch_assoc()) {
            $type = $row["QUESTION_TYPE"];
            $date = $row["CREATE_DATE"];
            $group = $row["QUESTION_GROUP"];
        }
    ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-success">แบบสอบถาม <u>แนะนำ</u></span></h3>
        <h3>
            <?php echo $type ?>
        </h3>
        <small>สร้างเมื่อ <?php echo $date ?></small>
        <hr> 
        <a title="ทำแบบทดสอบ" href="career-advice.php?career=check_formtest&QUESTION_GROUP=<?php echo $group; ?>">
            ทำแบบสอบถาม
        </a> 
        </center>
    </div>
    <?php
        }
    ?>
    </div>
</div>

<div class = "row">
    <!-- all question -->
    <div class = "col-md-6">
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-danger">แผนการเรียน</span></h3>
        <?php
            $sql = "SELECT * FROM MAPPING_STUDENT_PLAN WHERE STUDENT_ID = " . $_SESSION["USER_ID"];
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            if ($row["STUDENT_PLAN"] == 'GENERAL') {
                $plan = 'แผนการเรียนทั่วไป';
            } else if ($row["STUDENT_PLAN"] == 'LIFE') {
                $plan = 'แผนการเรียนตลอดชีวิต';
            }

        ?>
        <h1>
            <?php echo $plan ?>
        </h1>
        <hr>
        <a title="จัดการแผนการเรียน" href="career-advice.php?career=student_module">
            จัดการแผนการเรียน
        </a>
        </center>
    </div>
    </div>

    <!-- last question -->
    <div class = "col-md-6">
    <?php
        $sql = "SELECT COUNT(*) AS COUNT FROM M_CAREER";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
                $count = $row["COUNT"];
            }
    ?>    
    <div class="alert  alert-warning alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
            <h3><span class="badge badge-pill badge-warning">แนะนำแผนการเรียน</span></h3>
            <h1>
                <?php echo $count ?> อาชีพ
            </h1>
            <hr> 
            <a title="แผนการเรียน" href="career-advice.php?career=dashboard_career_module">แผนการเรียน</a> 
        </center>
    </div>
    <?php
        }
    ?>
    </div>
</div>