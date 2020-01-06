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

<?php 

	include('db/db.php'); 

	$QUESTION_GROUP = $_REQUEST["QUESTION_GROUP"];
	$CREATE_DATE = $_REQUEST["CREATE_DATE"];
	
?>

<div class="col-lg-12">
	<div class="card">
		<div class="card-header">  
			<strong>หน้าแสดงผล หลังทำแบบทดสอบ</strong> 
		</div>
		<div class="card-body card-block">
			<form action="career-advice.php?career=insertuser" method="post" enctype="multipart/form-data" class="form-horizontal"> 
				<div class="content mt-3">
					<?php
						$sql = "SELECT * FROM MAPPING_STUDENT_REPORT AS R
							LEFT JOIN M_GROUP_QUESTION AS G ON R.QUESTION_ID = G.QUESTION_ID
							WHERE STUDENT_ID = " . $_SESSION['USER_ID'] . " AND G.QUESTION_GROUP = $QUESTION_GROUP
							AND R.CREATE_DATE = '$CREATE_DATE' GROUP BY QUESTION_PART";

						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($result->num_rows == 2) {
										include('report_dashboard_career_skill.php');
										include('report_dashboard_career_psychology.php');
									} else {
									if ($row["QUESTION_PART"] == "ด้านทักษะ") {
										include('report_dashboard_career_skill.php');
									}
									if ($row["QUESTION_PART"] == "จิตวิทยา") {
										include('report_dashboard_career_psychology.php');
									}
								}
							}
						}
					?>
						<!-- <?php include('report_dashboard_career_skill.php'); ?>
						<?php include('report_dashboard_career_psychology.php'); ?> -->
				</div>
			</form>
		</div>
	</div>
</div>
<div class = "row apadding">

	<div class="col-md-1"> 
		<a href="javascript:history.back();">
			<button class="btn btn-secondary" style = "width: 100%;">กลับ</i></button></a>
		</a> 
	</div>

	<div class = "col-md-8"></div>

	<div class="col-md-3"> 
		<a href="career-advice.php?career=student_manage_module">
			<button class="btn btn-secondary" style = "width: 100%;">จัดการแผนการเรียน</i></button></a>
		</a> 
	</div>
</div>
