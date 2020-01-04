<div class = "row">
    <!-- all question -->
    <div class = "col-md-6">
    <div class="alert  alert-success alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-success">แบบสอบถามทั้งหมด</span></h3>
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

    <!-- ?? -->
    <!-- <div class = "col-md-4">
    <div class="alert  alert-success alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-success">แบบสอบถามทั้งหมด</span></h3>
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
    </div> -->

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
    <div class="alert  alert-danger alert-dismissible fade show" role="alert" style = "height: 23vh;">
        <center>
        <h3><span class="badge badge-pill badge-danger">แบบสอบถาม <u>แนะนำ</u></span></h3>
        <h3>
            <?php echo $type ?>
        </h3>
        <small>สร้างเมื่อ <?php echo $date ?></small>
        <hr> 
        <a title="ทำแบบทดสอบ" href="career-advice.php?career=check_formtest&q_group=<?php echo $group; ?>">
            ทำแบบสอบถาม
        </a> 
        </center>
    </div>
    <?php
        }
    ?>
    </div>
</div>