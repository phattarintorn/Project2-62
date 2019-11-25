<?php
include("db/db.php");
?>
<br>

<div class="col-lg-12">
  <div class="card-header">
    <strong class="card-title">แจ้งเตือน</strong>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-12">
    <div class="col-md-12" title="แจ้งเตือน"> 
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" title="ปิด">&times;</span>
        </button>
        <?php
        $sql = "SELECT COUNT(QUESTION_ID)
        FROM M_GROUP_QUESTION 
        WHERE QUESTION_STATUS = 0 GROUP BY QUESTION_GROUP";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        { 
          $c_id = 0;
          while($row = $result->fetch_assoc()) 
          {
            $c_id = $c_id +1;
          }
        } 
        ?>
        <span>มี</span>
        <span class="badge badge-pill badge-success"><?php echo $c_id ?></span> 
        <span>แบบสอบถามในระบบ</span>
      </div> 
    </div>  
  </div> 

  <div class="col-lg-12">
    <?php
    $advisor_id = $_SESSION["USER_ID"];
    $sql = "SELECT SUM(MAPPING_STUDENT_REPORT.RAW_SCORE), 
    MAPPING_STUDENT_REPORT.CAREER_ID,
    MAPPING_STUDENT_REPORT.STUDENT_ID, 
    M_USER.USER_ID
    FROM MAPPING_STUDENT_REPORT,M_USER WHERE M_USER.USER_STATUS = 'STUDENT'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {  
      $count = 0; 
      ?> 
      <div class="col-md-12" title="แจ้งเตือน"> 
        <div class="alert  alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" title="ปิด">&times;</span>
          </button>
          <?php
          
          while($row = $result->fetch_assoc()) 
          {
            $count = $count +1;
          }
          
          ?>
          <span>มี</span>
          <span class="badge badge-pill badge-warning"><?php echo $count ?></span>
          <span>แบบสอบถาม <u>ทำแล้ว</u> ของนักศึกษาในที่ปรึกษาของท่าน </span>
        </div> 
      </div>  
      <?php  
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
