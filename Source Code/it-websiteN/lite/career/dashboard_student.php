<?php
  include("db/db.php"); 

  $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS M
    LEFT JOIN M_USER AS U ON M.ADVISOR_ID = U.USER_ID
    LEFT JOIN M_CAREER AS C ON M.CAREER_ID = C.CAREER_ID
    WHERE M.STUDENT_ID = " . $_SESSION["USER_ID"];

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<div class = "card">
  <div class = "card-header">
    <strong class = "card-title"> ยินดีต้อนรับนักศึกษา <?php echo $_SESSION["USER_FIRSTNAME"]  ?></strong>
  </div>
  <div class = "card-body" style = "padding : 20px;">
    <div class = "card" align = "center">
      <div class = "card-body" style = "padding : 20px;">
        <div class = "row">
          <div class = "col-md-4">
            <img style="width:auto; height:30vh; margin-bottom: 10px;" src="images/career/character/<?php echo $row["CAREER_IMAGE"] ?>">
          </div>
          <div class = "col-md-2" align = "left">
            <div class = "row">อาชีพ</div>
            <br>
            <div class = "row">อาจารย์ที่ปรึกษา</div>
          </div>
          <div class = "col-md-5" align = "left">
            <div class = "row"><?php echo $row["CAREER_NAME"] ?></div>
            <br>
            <div class = "row"><?php echo $row["USER_FIRSTNAME"] . ' ' . $row["USER_LASTNAME"] ?></div>
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