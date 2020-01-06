<?php
  include("db/db.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM MAPPING_STUDENT_REPORT WHERE STUDENT_ID = " . $_SESSION['USER_ID'];
  $result = $conn->query($sql);

  if (isset($result->num_rows)) {
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">รายงาน</strong> 
      <small>ประมวลผลการทำแบบสอบถามทั้งหมด</small>
    </div> 
    <div class="col-md-12">
      <div class="animated fadeIn">
        <br> 
        <div class="row">
          <div class="col-lg-6">
            <?php include('dashboard_highcharts_psychology.php'); ?>
          </div> 
          <!-- ------------------------------------------------------------------- -->
          <div class="col-lg-6">
            <?php include('dashboard_highcharts_skill.php'); ?>
          </div> 
        </div>
      </div> 
    </div> 
  </div> 
</div>
<?php
  } else {
    echo ("	<script = 'javascript'>
				alert('ยังไม่เคยทำแบบประเมิณ กรุณาทำแบบประเมิณก่อน')
				window.location.href='career-advice.php?career=tables_q';
			</script>
		");
  }
?>