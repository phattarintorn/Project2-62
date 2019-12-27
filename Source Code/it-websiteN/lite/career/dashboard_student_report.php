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

              $sql = "SELECT SUM(R.RAW_SCORE) AS RAW, R.CAREER_ID AS ID, C.CAREER_NAME AS CAREER, C.CAREER_IMAGE AS IMAGE,
                Q.QUESTION_TYPE AS TYPE, SUM(R.TOTAL_SCORE) AS TOTAL FROM MAPPING_STUDENT_REPORT AS R
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
                    echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["IMAGE"].'" title="'.$row["CAREER"].'">
                      <br><a href="career-advice.php?career=career_module&CAREER_ID=' . $row["ID"] . '"> '.$row['CAREER'].'<a></center></td>';
                    $Max_scoreS = ($row['RAW'] / $row['TOTAL']) * 100;
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

              $sql = "SELECT SUM(R.RAW_SCORE) AS RAW, R.CAREER_ID AS ID, C.CAREER_NAME AS CAREER, C.CAREER_IMAGE AS IMAGE,
                Q.QUESTION_TYPE AS TYPE, SUM(R.TOTAL_SCORE) AS TOTAL FROM MAPPING_STUDENT_REPORT AS R
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
                    echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["IMAGE"].'" title="'.$row["CAREER"].'">
                      <br><a href="career-advice.php?career=career_module&CAREER_ID=' . $row["ID"] . '"> '.$row['CAREER'].'<a></center></td>';
                    $Max_scoreP = ($row['RAW'] / $row['TOTAL']) * 100;
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
              }
            ?>
          </div> 
        </div>
      </div> 
    </div> 
  </div> 
</div>