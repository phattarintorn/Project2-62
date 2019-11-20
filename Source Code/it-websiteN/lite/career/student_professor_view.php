<?php
//DB
include("db/db.php"); 


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$id = $_REQUEST['id'];

$sql = "SELECT * FROM `customer` WHERE `id`=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 


  while($row = $result->fetch_assoc()) 
  {
    ?>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong>ข้อมูลนักศึกษา : <?php echo $row["firstname"].' '.$row["lastname"]; ?> </strong>
        </div>

        <div class="card-body card-block">

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <!-- <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">สถานะ</label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["status"]; ?>
            </div> -->

            <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">รหัสนักศึกษา : </label>
            </div>
            <div class="col col-md-3">
              <?php echo $row["user_id"]; ?>
              <input type="hidden" name="user_id" class="form-control" value="<?php echo $row["user_id"]; ?>">
            </div> 
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">ชื่อ : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["firstname"]; ?>
            </div> 
            <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">นามสกุล : </label>
            </div>
            <div class="col col-md-3">
              <?php echo $row["lastname"]; ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">อีเมล : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["email"]; ?>
            </div>
            <div class="col col-md-2">
              <label for="text-input" class=" form-control-label">เพศ : </label>
            </div>
            <div class="col col-md-3">
              <?php echo $row["sex"]; ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["advisors"]; ?>
            </div>
          </div>


          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">เกรดเฉลี่ยต่อเทอม : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["gpa"]; ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">เกรดเฉลี่ยร่วม : </label>
            </div>
            <div class="col col-md-4">
              <?php echo $row["gpax"]; ?>
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

$sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$id' AND `side` = 'ด้านทักษะ' GROUP BY `career`,`side` ORDER BY raw DESC";
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

$sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$id' AND `side` = 'ด้านจิตวิทยา' GROUP BY `career`,`side` ORDER BY raw DESC";
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

            $sql = "SELECT SUM(sum_form.raw_score) AS raw,sum_form.career AS career,data_career.career_character AS datachar ,sum_form.side AS side,sum_form.type AS type FROM `sum_form`,`data_career` WHERE sum_form.user_id = '$id' AND sum_form.side = 'ด้านทักษะ' AND sum_form.career=data_career.career_name GROUP BY sum_form.career,sum_form.side ORDER BY raw DESC";
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
              <th scope="col" width="60%"><center>อาชีพ</center></th>
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
          $sql = "SELECT SUM(sum_form.raw_score) AS raw,sum_form.career AS career,data_career.career_character AS datachar ,sum_form.side AS side,sum_form.type AS type FROM `sum_form`,`data_career` WHERE sum_form.user_id = '$id' AND sum_form.side = 'ด้านจิตวิทยา' AND sum_form.career=data_career.career_name GROUP BY sum_form.career,sum_form.side ORDER BY raw DESC";
          
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
            <th scope="col" width="60%"><center>อาชีพ</center></th>
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
               $Max_scoreS = ($row['raw'] / $sum_rawP)*100;
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