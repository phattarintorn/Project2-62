<?php
include("db/db.php");
?>
<div class="row">
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
        <h1>
          <?php echo $c_id ?>
        </h1>
        <hr>
        <a href="career-advice.php?career=tables_q">
          <i class="mdi mdi-message-bulleted"></i> ทำแบบสอบถาม
        </a>  
        <?php 
        ?>
      </center>
    </div> 
  </div>  
</div> 

<div class="col-lg-4">
  <?php
  $_SESSION_id = $_SESSION["id"];

  $sql = "SELECT COUNT(`form_id`) AS count FROM test_form WHERE `user_id` = '$_SESSION_id'  GROUP BY `form_date`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {  
    $count = 0; 
    ?> 
    <div class="col-md-12"> 
      <div class="alert  alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <br>
          <h3><span class="badge badge-pill badge-warning">แบบสอบถาม <u>ทำแล้ว</u></span></h3>
          <?php
          while($row = $result->fetch_assoc()) 
          {
            $count = $count +1;
          }
          ?>
          <h1>
            <?php echo $count ?>
          </h1>
          <hr> 
          <a href="career-advice.php?career=tables_history">
            <i class="mdi mdi-bulletin-board"></i> ดูประวัติดูประวัติ
          </a>  
        </center>
      </div> 
    </div>  
    <?php  
  } 
  ?>
</div> 
<div class="col-lg-4">
  <?php
  $_SESSION_id = $_SESSION["id"];

  $sql = "SELECT * FROM `question` WHERE `status_using`=0 AND choose_no != ''  GROUP BY `q_group` DESC LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {  
    $count = 0; 
    ?> 
    <div class="col-md-12"> 
      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <br>
          <h3><span class="badge badge-pill badge-danger">แบบสอบถาม <u>แนะนำ</u></span></h3>
          <?php
          while($row = $result->fetch_assoc()) 
          {
            $q_side = $row["q_side"];
            $q_day = $row["q_day"];
            $q_group = $row["q_group"];
          }
          ?>
          <h3>
            <?php echo $q_side ?>
          </h3>
          <small>สร้างเมื่อ <?php echo $q_day ?></small>
          <hr> 
          <a title="ทำแบบทดสอบ" href="career-advice.php?career=check_formtest&q_group=<?php echo $q_group; ?>">
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
$_SESSION_id = $_SESSION["id"];

$sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านทักษะ' GROUP BY `career`,`side` ORDER BY raw DESC";
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
  // echo '$sum_rawS '. $sum_rawS.'<br>';
}
?>

<?php
include("db/db.php");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$_SESSION_id = $_SESSION["id"];

$sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านจิตวิทยา' GROUP BY `career`,`side` ORDER BY raw DESC";
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
            $_SESSION_id = $_SESSION["id"];

            //$sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านทักษะ' GROUP BY `career`,`side` ORDER BY raw DESC";
            $sql = "SELECT SUM(sum_form.raw_score) AS raw,sum_form.career AS career,data_career.career_character AS datachar ,sum_form.side AS side,sum_form.type AS type FROM `sum_form`,`data_career` WHERE sum_form.user_id = '$_SESSION_id' AND sum_form.side = 'ด้านทักษะ' AND sum_form.career=data_career.career_name GROUP BY sum_form.career,sum_form.side ORDER BY raw DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            { 
              $i = 0;
              $sumMax = 0;
              $side = $row["side"];
              $type = $row["type"];
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
              while($row = $result->fetch_assoc()) 
              {
                $i = $i +1;  
                echo "<tr>";
                if ($i <= "5") {
                 echo '<td><center><br><br><h3>' .$i. '</h3></center></td>';
                 echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["datachar"].'" title="'.$row["career"].'"><br>'.$row['career'].'</center></td>';
                 $Max_scoreS = ($row['raw'] / $sum_rawS)*100;
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
          $_SESSION_id = $_SESSION["id"];

          $sql = "SELECT SUM(sum_form.raw_score) AS raw,sum_form.career AS career,data_career.career_character AS datachar ,sum_form.side AS side,sum_form.type AS type FROM `sum_form`,`data_career` WHERE sum_form.user_id = '$_SESSION_id' AND sum_form.side = 'ด้านจิตวิทยา' AND sum_form.career=data_career.career_name GROUP BY sum_form.career,sum_form.side ORDER BY raw DESC";

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
            while($row = $result->fetch_assoc()) 
            {
                $i = $i +1;  
                echo "<tr>";
                if ($i <= "5") {
                 echo '<td><center><br><br><h3>' .$i. '</h3></center></td>';
                 echo '<td><center><img style="width:35%;height:45%" src="images/career/character/'.$row["datachar"].'" title="'.$row["career"].'"><br>'.$row['career'].'</center></td>';
                 $Max_scoreP = ($row['raw'] / $sum_rawP)*100;
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

     </div> <!-- ปิด -->

   </div> 
 </div> 

</div> 
</div>