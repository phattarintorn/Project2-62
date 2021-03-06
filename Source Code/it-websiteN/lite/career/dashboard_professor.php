<?php
include("db/db.php");
$advisor_id = $_SESSION["USER_ID"];
?>
<br>

<div class="card col-lg-12" style = "padding-left: 0; padding-right: 0;">
  <div class="card-header">
    <strong class="card-title">แจ้งเตือน</strong>
  </div>
  <br>
  <div class="row">

  <div class="col-lg-12">
    <?php
    $sql = "SELECT std_data.STUDENT_ID FROM mapping_student_data AS std_data
    LEFT JOIN mapping_student_plan AS std_p ON std_p.STUDENT_ID = std_data.STUDENT_ID
    WHERE std_data.ADVISOR_ID = $advisor_id AND std_p.PLAN_STATUS = 0
    GROUP BY std_p.STUDENT_ID";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {  
      $count = 0; 
      ?> 
      <div class="col-md-12" title="แจ้งเตือน"> 
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          <?php
          
          while($row = $result->fetch_assoc()) 
          {
            $count = $count +1;
          }
          
          ?>
          <span>มีนักศึกษา</span>
          <span class="badge badge-pill badge-danger"><?php echo $count ?></span>
          <span>คน ในที่ปรึกษาของท่าน <u>ยังไม่ผ่าน</u> การยืนยันแผนการเรียน</span>
        </div>  
      </div>  
      <?php  
    }
    ?>
  </div>

   <div class="col-lg-12">
    <div class="col-md-12" title="แจ้งเตือน"> 
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" title="ปิด">&times;</span>
        </button>
        <?php
        $sql = "SELECT COUNT(QUESTION_ID) AS Question
        FROM M_GROUP_QUESTION 
        WHERE QUESTION_STATUS = 0 GROUP BY QUESTION_GROUP";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        { 
          while($row = $result->fetch_assoc()) 
          {
            $q = $row['Question'];
          }
          echo '<span>มี</span>
                <span class="badge badge-pill badge-success">';
                ?> <?php echo $q ?></span> 
                <?php echo '<span>แบบสอบถามในระบบ</span>';
        }
        else
        {
          echo '<span>ไม่มีแบบสอบถามที่เปิดใช้งานในระบบ</span>';
        } 
        ?>
        
      </div> 
    </div>  
  </div> 

  <div class="col-lg-12">
    <?php
    $sql = "SELECT SUM(sr.RAW_SCORE) AS sum FROM mapping_student_data AS sd
    LEFT JOIN mapping_student_report AS sr ON sd.STUDENT_ID = sr.STUDENT_ID
    WHERE sd.ADVISOR_ID = $advisor_id AND sr.RAW_SCORE IS NOT NULL
    GROUP BY sd.STUDENT_ID";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {  
      $count = 0; 
      ?> 
      <div class="col-md-12" title="แจ้งเตือน"> 
        <div class="alert  alert-info alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" title="ปิด">&times;</span>
          </button>
          <?php
          
          while($row = $result->fetch_assoc()) 
          {
            $count = $count +1;
          }
          
          ?>
          <span>มีนักศึกษา</span>
          <span class="badge badge-pill badge-info"><?php echo $count ?></span>
          <span>คน ในที่ปรึกษาของท่าน <u>ทำแบบสอบถามแล้ว</u>  </span>
        </div> 
      </div>  
      <?php  
    } else {
      echo '<div class="col-md-12" title="แจ้งเตือน"> 
      <div class="alert  alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" title="ปิด">&times;</span>
        </button>
        <span>นักศึกษาในที่ปรึกษาของท่านยังไม่ทำแบบสอบถาม</span>
        </div> 
      </div>';
    }
    ?>
  </div> 
</div> 
</div>


<div class="col-lg-12">
  <hr>
  <div class="card-body">
    <center>
 

    </center>
  </div> 
</div>
