<?php
  include("db/db.php"); 

  $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS M
    LEFT JOIN M_USER AS U ON M.ADVISOR_ID = U.USER_ID
    LEFT JOIN M_CAREER AS C ON M.CAREER_ID = C.CAREER_ID
    WHERE M.STUDENT_ID = " . $_SESSION["USER_ID"] . " AND M.CAREER_ID <> 0";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $img = $row["CAREER_IMAGE"];
      $career = $row["CAREER_NAME"];
      $name = $row["USER_FIRSTNAME"] . ' ' . $row["USER_LASTNAME"];
      $mail = $row["USER_EMAIL"];
      $tel = $row["USER_TEL"];
?>

<style>
  .cpadding {
    padding-left: 0;
    padding-right: 0;
  }
  .apadding {
    padding-left: 1vw;
    padding-right: 1vw;
  }
</style>

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
        $status = $row["PLAN_STATUS"];
        echo '<div class = "row">';
        echo '<div class = "col-md-12">';
        if ($status == 0) {
          echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          echo '<span aria-hidden="true" title="ปิด">&times;</span>';
          echo '</button>';
          echo '<span>แผนการเรียนของนักศึกษา <u>ยังไม่ผ่าน</u> กรุณาติดต่ออาจารย์ที่ปรึกษา</span>';
          echo '</div>';
      } else if ($status == 1) {
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

    <div class = "row apadding">
      <?php if ($status == 1) { ?>
      <div class = "col-md-3 card cpadding" style=" margin-right: 1vw;">
        <div class = "card-header">
          <strong class = "card-title" style = "text-align: left;"> ดาวน์โหลดแผนการเรียน </strong>
        </div>
        <div class = "card-body" align = "center" style = "padding : 20px;">
          <div id="qrcode"></div>
        </div>
      </div>
      <?php } ?>
      <div class = "col-md card cpadding">
        <div class = "card-header">
          <strong class = "card-title" style = "text-align: left;">ข้อมูลเบื่องต้น</strong>
        </div>
        <div class = "card-body" align = "left" style = "padding : 20px;">
          <div class = "row apadding">
            <div class = "col-md-4" align = "center">
              <?php
                if (isset($career)) {
                  echo '<img src = "images/career/character/' . $img . '" style = "width: 11.5em;">';
                }
              ?>
            </div>
            <div class = "col-md-3" style = "margin-left: 1vw;">
              <br/>
              <div class = "row apadding">อาชีพ : </div>
              <br/>
              <br/>
              <div class = "row apadding">อาจารย์ที่ปรึกษา : </div>
              <br/>
              <div class = "row apadding">เมลติดต่อ : </div>
              <br/>
              <div class = "row apadding">เบอร์โทรติดต่อ : </div>
            </div>
            <div class = "col-md" style = "margin-left: 1vw;">
              <br/>
              <div class = "row apadding">
                <?php
                  if (isset($career)) {
                    echo $career;
                  } else {
                    echo "-";
                  }
                ?>
              </div>
              <br/>
              <br/>
              <div class = "row apadding">
                <?php
                  if (isset($name)) {
                    echo $name;
                  } else {
                    echo "-";
                  }
                ?>
              </div>
              <br/>
              <div class = "row apadding">
                <?php
                  if (isset($mail)) {
                    echo $mail;
                  } else {
                    echo "-";
                  }
                ?>
              </div>
              <br/>
              <div class = "row apadding">
                <?php
                  if (isset($tel)) {
                    echo $tel;
                  } else {
                    echo "-";
                  }
                ?>
              </div>
              <br/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("student_dashboard_topic.php") ?>

<?php
    }
  } else {
    ?>
    <div class = "card">
      <div class = "card-header">
        <strong class = "card-title"> ยินดีต้อนรับนักศึกษา <?php echo $_SESSION["USER_FIRSTNAME"]  ?></strong>
      </div>
      <div class = "card-body" style = "padding : 20px;">
        <?php
          include("student_dashboard.php");
        ?>
      </div>
    <?php
  }
?>
  </div>
</div>

<script>
  let path = "http://it2.sut.ac.th/project62_g2/it-websiteN/lite/"
    path += "career-advice.php?career=student_download_module&STUDENT_ID=<?php echo $_SESSION["USER_ID"] ?>"

  new QRCode(document.getElementById("qrcode"), {
      text: path,
      width: 200,
      height: 200,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
  });
  
</script>