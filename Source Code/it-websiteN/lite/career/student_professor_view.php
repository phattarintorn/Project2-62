<?php
//DB
include("db/db.php"); 


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$id = $_REQUEST['id'];

$sql = "SELECT * FROM M_USER AS u
        LEFT JOIN MAPPING_STUDENT_DATA AS mdata
        ON u.USER_ID = mdata.STUDENT_ID
        WHERE USER_ID =".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 


  while($row = $result->fetch_assoc()) 
  {
    ?>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong>ข้อมูลนักศึกษา : <?php echo $row["USER_FIRSTNAME"].' '.$row["USER_LASTNAME"]; ?> </strong>
        </div>

        <div class="card-body card-block">

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">รหัสนักศึกษา : </label>
            </div>
            <div class="col col-md-3">
              <?php echo $row["USER_USERNAME"]; ?>
              <input type="hidden" name="USER_USERNAME" class="form-control" value="<?php echo $row["USER_USERNAME"]; ?>">
            </div> 
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">ชื่อ : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_FIRSTNAME"]; ?>
            </div> 

          </div>
          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">นามสกุล : </label>
            </div>
            <div class="col col-md-3">
              <?php echo $row["USER_LASTNAME"]; ?>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">เบอร์โทร : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_TEL"]; ?>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">อีเมล : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_EMAIL"]; ?>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">เกรดเฉลี่ยต่อเทอม : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_GPA"]; ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">เกรดเฉลี่ยร่วม : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_GPAX"]; ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php  
  }

}

include('dashboard_student_report.php');

?>

</div> 
</div>