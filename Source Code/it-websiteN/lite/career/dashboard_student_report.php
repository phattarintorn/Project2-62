<?php
  include("db/db.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_REQUEST["id"])) {
    $STUDENT_ID = $_REQUEST["id"];
  } else {
    $STUDENT_ID = $_SESSION["USER_ID"];
  }

  $sql = "SELECT * FROM MAPPING_STUDENT_REPORT AS R
    LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
    WHERE STUDENT_ID = $STUDENT_ID GROUP BY Q.QUESTION_PART";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
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
          <?php
            while($row = $result->fetch_assoc()) {
              echo '<div class="col-lg-12">';
              include('report_dashboard_highcharts.php');
              echo '</div>';
            }
          ?>
        </div>
      </div> 
    </div> 
  </div> 
</div>
<?php
  } else {
    if (!isset($_REQUEST["id"])){
      echo ("<script = 'javascript'>
          alert('ยังไม่เคยทำแบบประเมิณ กรุณาทำแบบประเมิณก่อน')
          window.location.href='career-advice.php?career=tables_q';
        </script>");
    }
  }
?>