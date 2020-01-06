<?php
  include("db/db.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $STUDENT_ID = $_SESSION["USER_ID"];

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
              if ($result->num_rows == 2) {
                echo '<div class="col-lg-6">';
                include('dashboard_highcharts_psychology.php');
                echo '</div>';

                echo '<div class="col-lg-6">';
                include('dashboard_highcharts_skill.php');
                echo '</div>';
              } else {
                if ($row["QUESTION_PART"] == 'ด้านจิตวิทยา') {
                  echo '<div class="col-lg-12">';
                  include('dashboard_highcharts_psychology.php');
                  echo '</div>';
                } else if ($row["QUESTION_PART"] == 'ด้านทักษะ') {
                  echo '<div class="col-lg-12">';
                  include('dashboard_highcharts_skill.php');
                  echo '</div>';
                }
              }
            }
          ?>
        </div>
      </div> 
    </div> 
  </div> 
</div>
<?php
  } else {
    echo ("<script = 'javascript'>
				alert('ยังไม่เคยทำแบบประเมิณ กรุณาทำแบบประเมิณก่อน')
				window.location.href='career-advice.php?career=tables_q';
			</script>");
  }
?>