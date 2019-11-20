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
        $sql = "SELECT COUNT(`q_id`) as c_id FROM `question` WHERE `status_using` = '0' GROUP BY `q_group`";
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
    $_SESSION_id = $_SESSION["id"];
    $firstname = $_SESSION["firstname"];

    $sql = "SELECT SUM(sum_form.raw_score) AS raw, sum_form.career AS career ,sum_form.side AS side , sum_form.type  AS type ,sum_form.user_id AS user_id , customer.advisors AS adv FROM sum_form,customer WHERE customer.status = 'student' AND customer.advisors LIKE '%".$firstname."%'";
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
