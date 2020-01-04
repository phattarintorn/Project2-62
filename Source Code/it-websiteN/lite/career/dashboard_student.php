<?php
  include("db/db.php"); 

  $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS M
    LEFT JOIN M_USER AS U ON M.ADVISOR_ID = U.USER_ID
    LEFT JOIN M_CAREER AS C ON M.CAREER_ID = C.CAREER_ID
    WHERE M.STUDENT_ID = " . $_SESSION["USER_ID"];

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $img = $row["CAREER_IMAGE"];
      $career = $row["CAREER_NAME"];
      $name = $row["USER_FIRSTNAME"] . ' ' . $row["USER_LASTNAME"];
?>
<div class = "card">
  <div class = "card-header">
    <strong class = "card-title"> ยินดีต้อนรับนักศึกษา <?php echo $_SESSION["USER_FIRSTNAME"]  ?></strong>
  </div>
  <div class = "card-body" style = "padding : 20px;">
    <?php
      $sql = "SELECT * FROM MAPPING_STUDENT_PLAN
        WHERE STUDENT_ID = " . $_SESSION["USER_ID"];

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class = "row">';
        echo '<div class = "col-md-12">';
        if ($row["PLAN_STATUS"] == 0) {
          echo '<div class = "alert  alert-danger alert-dismissible fade show" role = "alert">';
          echo '<span>แผนการเรียนของนักศึกษา <u>ยังไม่ผ่าน</u> กรุณาติดต่ออาจารย์ที่ปรึกษา</span>';
          echo '</div>';
      } else if ($row["PLAN_STATUS"] == 1) {
          echo '<div class="alert  alert-success alert-dismissible fade show" role="alert">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          echo '<span aria-hidden="true" title="ปิด">&times;</span>';
          echo '</button>';
          echo '<span>แผนการเรียนของนักศึกษา <u>ผ่าน</u> การยืนยันจากอาจารย์ที่ปรึกษาแล้ว</span>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
      }
    ?>

    <div class = "card" align = "center">
      <div class = "card-body" style = "padding : 20px;">
        <div class = "row">
          <div class = "col-md-4">
            <img style="width:auto; height:30vh; margin-bottom: 10px;" src="images/career/character/<?php echo $img ?>">
          </div>
          <div class = "col-md-2" align = "left">
            <div class = "row">อาชีพ</div>
            <br>
            <div class = "row">อาจารย์ที่ปรึกษา</div>
          </div>
          <div class = "col-md-5" align = "left">
            <div class = "row"><?php echo $career ?></div>
            <br>
            <div class = "row"><?php echo $name ?></div>
          </div>
        </div>
      </div>
    </div>
<?php
    }
  } else {
    include("career/dashboard_introduction.php");
  }
?>
  </div>
</div>