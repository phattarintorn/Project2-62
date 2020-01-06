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
        LEFT JOIN M_BRANCH AS b
        ON mdata.BRANCH_ID = b.BRANCH_ID
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
            <!-- <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">สถานะ</label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["USER_STATUS"]; ?>
            </div> -->

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
              <label for="text-input" class=" form-control-label">หลักสูตร : </label>
            </div>
            <div class="col col-md-8">
              <?php echo $row["BRANCH_NAME"]; ?>
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
?>   

<?php
include("db/db.php");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$id = $_REQUEST['id'];

$sql = "SELECT SUM(RAW_SCORE) AS raw,
m_career.CAREER_NAME AS career,
m_question.QUESTION_PART AS part
FROM MAPPING_STUDENT_REPORT AS m_report
LEFT JOIN M_GROUP_QUESTION AS m_question ON m_report.QUESTION_ID	= m_question.QUESTION_ID	
LEFT JOIN M_CAREER AS m_career ON m_report.CAREER_ID = m_career.CAREER_ID
LEFT JOIN M_USER AS m_user ON m_report.STUDENT_ID = m_user.USER_ID
WHERE m_user.USER_ID = $id AND m_question.QUESTION_ID = 1 GROUP BY career ORDER BY raw DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
  $i = 0;
  $sum_rawS = 0;

  while($row = $result->fetch_assoc()) 
  {
    $i = $i +1;  
    if ($i <= "5") {
      $sum_rawS = $sum_rawS  + $row['raw'];
    }
  }
}
?>

<?php
include("db/db.php");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$id = $_REQUEST['id'];

$sql = "SELECT SUM(RAW_SCORE) AS raw,
m_career.CAREER_NAME AS career,
m_question.QUESTION_PART AS part
FROM MAPPING_STUDENT_REPORT AS m_report
LEFT JOIN M_GROUP_QUESTION AS m_question ON m_report.QUESTION_ID	= m_question.QUESTION_ID	
LEFT JOIN M_CAREER AS m_career ON m_report.CAREER_ID = m_career.CAREER_ID
LEFT JOIN M_USER AS m_user ON m_report.STUDENT_ID = m_user.USER_ID
WHERE m_user.USER_ID = $id AND m_question.QUESTION_ID = 2 GROUP BY career ORDER BY raw DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
  $i = 0;
  $sum_rawP = 0;

  while($row = $result->fetch_assoc()) 
  {
    $i = $i +1;  
    if ($i <= "5") {
      $sum_rawP = $sum_rawP  + $row['raw'];
    }
  }
  // echo '$sum_rawP'. $sum_rawP.'<br>';
}
?>
<div class="col-md-12">
  <div class="card">

    <div class="card-header">
      <strong class="card-title">รายงาน</strong> 
      <small>ประมวลผลการทำแบบสอบถามของนักศึกษา</small>
    </div> 

    <div class="col-md-12">
      <div class="animated fadeIn">
        <br> 

        <div class="row">
          <div class="col-lg-6">
            <?php
            include("db/db.php");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } 
            $id = $_REQUEST['id'];

            $sql = "SELECT SUM(RAW_SCORE) AS raw,
            m_career.CAREER_NAME AS career,
            m_career.CAREER_IMAGE AS img,
            m_question.QUESTION_PART AS part
            FROM MAPPING_STUDENT_REPORT AS m_report
            LEFT JOIN M_GROUP_QUESTION AS m_question ON m_report.QUESTION_ID	= m_question.QUESTION_ID	
            LEFT JOIN M_CAREER AS m_career ON m_report.CAREER_ID = m_career.CAREER_ID
            LEFT JOIN M_USER AS m_user ON m_report.STUDENT_ID = m_user.USER_ID
            WHERE m_user.USER_ID = $id AND m_question.QUESTION_ID = 1 GROUP BY career ORDER BY raw DESC";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            { 
              include("student_professor_view_dashboardS.php");
           }else{
            echo '
            <div class="row form-group">
            <div class="col col-md-12">
            <center>
            นักศึกษายังไม่ได้ทำแบบสอบถามด้านทักษะ 
            </center>
            </div>
            </div>
            ';
          }
          ?>
        </div> 
        <!-- ------------------------------------------------------------------- -->
        <div class="col-lg-6">
          <?php
          include("db/db.php");

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $id = $_REQUEST['id'];
          $sql = "SELECT SUM(RAW_SCORE) AS raw,
          m_career.CAREER_NAME AS career,
          m_career.CAREER_IMAGE AS img,
          m_question.QUESTION_PART AS part
          FROM MAPPING_STUDENT_REPORT AS m_report
          LEFT JOIN M_GROUP_QUESTION AS m_question ON m_report.QUESTION_ID	= m_question.QUESTION_ID	
          LEFT JOIN M_CAREER AS m_career ON m_report.CAREER_ID = m_career.CAREER_ID
          LEFT JOIN M_USER AS m_user ON m_report.STUDENT_ID = m_user.USER_ID
          WHERE m_user.USER_ID = $id AND m_question.QUESTION_ID = 2 GROUP BY career ORDER BY raw DESC";
          
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          { 
           include("student_professor_view_dashboardP.php");
         }else{
          echo '
          <div class="row form-group">
          <div class="col col-md-12">
          <center>
          นักศึกษายังไม่ได้ทำแบบสอบถามด้านจิตวิทยา 
          </center>
          </div>
          </div>
          ';
        }
        ?>
      </div> 

    </div> <!-- ปิด -->

  </div> 
</div> 

</div> 
</div>