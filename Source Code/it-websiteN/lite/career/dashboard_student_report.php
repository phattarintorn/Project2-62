<?php include("db/db.php"); ?>
<div class="row">
  <!-- ALL QUESTION -->
  <div class="col-lg-4">
    <div class="col-md-12"> 
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <br>
          <h3><span class="badge badge-pill badge-success">แบบสอบถามทั้งหมด</span></h3>
          <?php
            $num = 0;

            $sql = "SELECT COUNT(*) FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = '0' GROUP BY QUESTION_GROUP";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) { 
              // $num = 0;
              while($row = $result->fetch_assoc()) {
                $num = $num + 1;
              }
            } 
          ?>
          <h1>
            <?php echo $num ?>
          </h1>
          <hr>
          <a href="career-advice.php?career=tables_q">
            <i class="mdi mdi-message-bulleted"></i> ทำแบบสอบถาม
          </a>
        </center>
      </div> 
    </div>  
  </div>
  <!-- LOG QUESTION -->
  <div class="col-lg-4">
    <?php
   
    $sql = "SELECT COUNT(MAPPING_STUDENT_LOG_ID) AS COUNT FROM MAPPING_STUDENT_LOG AS L
      LEFT JOIN MAPPING_QUESTION AS Q ON Q.MAPPING_QUESTION_ID = L.MAPPING_QUESTION_ID
      WHERE STUDENT_ID = " . $_SESSION["USER_ID"] . " GROUP BY L.CREATE_DATE";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {  
      $count = 0; 
      ?> 
      <div class="col-md-12"> 
        <div class="alert  alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>
            <br>
            <h3><span class="badge badge-pill badge-warning">แบบสอบถามทำแล้ว</span></h3>
            <?php
              while($row = $result->fetch_assoc()) {
                $count = $count +1;
              }
            ?>
            <h1>
              <?php echo $count ?>
            </h1>
            <hr> 
            <a href="career-advice.php?career=tables_history">
              <i class="mdi mdi-bulletin-board"></i> ดูประวัติการทำแบบสอบถาม
            </a>  
          </center>
        </div> 
      </div>  
      <?php  
    } 
    ?>
  </div>
  <!-- LAST QUESTION -->
  <div class="col-lg-4">
    <?php
      $sql = "SELECT * FROM M_GROUP_QUESTION WHERE QUESTION_STATUS = 0 GROUP BY QUESTION_GROUP DESC LIMIT 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {  
        $count = 0;

    ?> 
    <div class="col-md-12"> 
      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <br>
          <h3><span class="badge badge-pill badge-danger">แบบสอบถามแนะนำ</span></h3>
          <?php
            while($row = $result->fetch_assoc()) {
              $QUESTION_GROUP = $row["QUESTION_GROUP"];
              $QUESTION_PART = $row["QUESTION_PART"];
              $CREATE_DATE = $row["CREATE_DATE"];
            }
          ?>
          <h3>
            <?php echo $QUESTION_PART ?>
          </h3>
          <small>สร้างเมื่อ <?php echo $CREATE_DATE ?></small>
          <hr> 
          <a title="ทำแบบทดสอบ" href="career-advice.php?career=check_formtest&QUESTION_GROUP=<?php echo $QUESTION_GROUP; ?>">
            <i class="mdi mdi-message-bulleted"></i> ทำแบบสอบถาม
          </a> 
        </center>
      </div> 
    </div>  
    <?php  
      } 
    ?>
  </div> 
</div>

<?php
  include("db/db.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT SUM(RAW_SCORE) AS RAW FROM MAPPING_STUDENT_REPORT AS R
    LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
    WHERE R.STUDENT_ID = " . $_SESSION['USER_ID'] . " AND Q.QUESTION_PART = 'ด้านทักษะ' 
    GROUP BY R.CAREER_ID , Q.QUESTION_PART ORDER BY RAW DESC";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  { 
    $i = 0;
    $sum_rawS = 0;

    while($row = $result->fetch_assoc()) 
    {
      $i = $i +1;  
      if ($i <= "5") {
        $sum_rawS = $sum_rawS  + $row['RAW'];
      }
    }

  }
?>

<?php
  include("db/db.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  // $_SESSION_id = $_SESSION["id"];

  // $sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` 
  // WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านจิตวิทยา' GROUP BY `career`,`side` ORDER BY raw DESC";

  $sql = "SELECT SUM(RAW_SCORE) AS RAW FROM MAPPING_STUDENT_REPORT AS R
        LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
        WHERE R.STUDENT_ID = " . $_SESSION['USER_ID'] . " AND Q.QUESTION_PART = 'ด้านจิตวิทยา' 
        GROUP BY R.CAREER_ID , Q.QUESTION_PART ORDER BY RAW DESC";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  { 
    $i = 0;
    $sum_rawP = 0;

    while($row = $result->fetch_assoc()) 
    {
      $i = $i +1;  
      if ($i <= "5") {
        $sum_rawP = $sum_rawP  + $row['RAW'];
      }
    }

  }
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
            <?php
              include("db/db.php");

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT SUM(R.RAW_SCORE) AS RAW, C.CAREER_NAME AS CAREER, C.CAREER_IMAGE AS IMAGE,
                Q.QUESTION_TYPE AS TYPE FROM MAPPING_STUDENT_REPORT AS R
                LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
                LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
                WHERE R.STUDENT_ID = ".$_SESSION['USER_ID']." AND Q.QUESTION_PART = 'ด้านทักษะ'
                GROUP BY CAREER, TYPE ORDER BY RAW DESC";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) { 
                $i = 0;
                $sumMax = 0;

                echo '
                <div class="card">
                <div class="card-header">
                <strong class="card-title"><u></u> วัดด้านทักษะ</strong>
                </div>
                <div class="card-body">
                <table class="table">
                <thead>
                <tr>
                <th scope="col" width="20%"><center>อันดับที่</center></th>
                <th scope="col" width="40%"><center>อาชีพ</center></th>
                <th scope="col" width="20%"><center>ร้อยละ</center></th>
                <tbody>  
                ';
                while($row = $result->fetch_assoc()) {
                  $i = $i +1;  
                  echo "<tr>";
                  if ($i <= "5") {
                    echo '<td><center><br><br><h3>' .$i. '</h3></center></td>';
                    echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["IMAGE"].'" title="'.$row["CAREER"].'"><br>'.$row['CAREER'].'</center></td>';
                    $Max_scoreS = ($row['RAW'] / $sum_rawS)*100;
                    echo '<td><br><br><h3>' .number_format($Max_scoreS, 2, '.', ' '). '</h3></td>';
                  }
                }
              echo '
              </tbody> 
              </tr>
              </thead>
              </table>
              </div>
              </div>
              ';

              include("dashboard_highcharts_Askill.php");

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
              // $_SESSION_id = $_SESSION["id"];

              $sql = "SELECT SUM(R.RAW_SCORE) AS RAW, C.CAREER_NAME AS CAREER, C.CAREER_IMAGE AS IMAGE,
                Q.QUESTION_TYPE AS TYPE FROM MAPPING_STUDENT_REPORT AS R
                LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
                LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
                WHERE R.STUDENT_ID = ".$_SESSION['USER_ID']." AND Q.QUESTION_PART = 'ด้านจิตวิทยา'
                GROUP BY CAREER, TYPE ORDER BY RAW DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              { 
                $i = 0;
                $sumMax = 0;

                echo '
                <div class="card">
                <div class="card-header">
                <strong class="card-title"><u></u> วัดด้านจิตวิทยา</strong>
                </div>
                <div class="card-body">
                <table class="table">
                <thead>
                <tr>
                <th scope="col" width="20%"><center>อันดับที่</center></th>
                <th scope="col" width="40%"><center>อาชีพ</center></th>
                <th scope="col" width="20%"><center>ร้อยละ</center></th>
                <tbody>  
                ';

                while($row = $result->fetch_assoc()) {
                  $i = $i +1;  
                  echo "<tr>";
                  if ($i <= "5") {
                    echo '<td><center><br><br><h3>' .$i. '</h3></center></td>';
                    echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["IMAGE"].'" title="'.$row["CAREER"].'"><br>'.$row['CAREER'].'</center></td>';
                    $Max_scoreP = ($row['RAW'] / $sum_rawP)*100;
                    echo '<td><br><br><h3>' .number_format($Max_scoreP, 2, '.', ' '). '</h3></td>';
                  }
                }
                echo '
                </tbody> 
                </tr>
                </thead>
                </table>
                </div>
                </div>
                ';
                include("dashboard_highcharts_Apsychology.php");
              }
            ?>
          </div> 
        </div>
      </div> 
    </div> 
  </div> 
</div>