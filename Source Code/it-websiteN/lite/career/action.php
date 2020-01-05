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

<div class="col-lg-12">
	<div class="card">
		<div class="card-header">  
			<strong>หน้าแสดงผล หลังทำแบบทดสอบ</strong> 
		</div>
		<div class="card-body card-block">
			<form action="career-advice.php?career=insertuser" method="post" enctype="multipart/form-data" class="form-horizontal"> 
				<div class="content mt-3">
					
					<?php  
					include("db/db.php"); 

					if (isset($_REQUEST['q_id']) && !isset($_REQUEST['q_id2'])) {
						$q_id = $_REQUEST['q_id'];
						$_SESSION_id = $_SESSION["USER_ID"];
						$form_date = $_REQUEST['form_date']; 
						$form_type = $_REQUEST['form_type']; 
						$form_side = $_REQUEST['form_side']; 

						if ($form_side == 'ด้านทักษะ' && $form_type == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_skill.php"); //ได้แล้ว 
						}
						if ($form_side == 'ด้านจิตวิทยา' && $form_type == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_psychology.php"); //ได้แล้ว 
						}
						if ($form_side == 'ด้านทักษะ' && $form_type == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_skill.php"); //ได้แล้ว 
						}
						if ($form_side == 'ด้านจิตวิทยา' && $form_type == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_psychology.php"); //ได้แล้ว 
						}
					} 

					if (isset($_REQUEST['q_id']) && isset($_REQUEST['q_id2'])) {
						$q_id = $_REQUEST['q_id'];
						$q_id2 = $_REQUEST['q_id2'];
						$_SESSION_id = $_SESSION["USER_ID"];
						$form_date = $_REQUEST['form_date']; 
						$form_type = $_REQUEST['form_type']; 
						$form_type2 = $_REQUEST['form_type2']; 
						$form_side = $_REQUEST['form_side']; 
						$form_side2 = $_REQUEST['form_side2']; 


						if ($form_side == 'ด้านทักษะ' && $form_type == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_skiil.php");   //ได้แล้ว 
						}
						if ($form_side == 'ด้านจิตวิทยา' && $form_type == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_psychology.php"); //ได้แล้ว 
						}
						if ($form_side == 'ด้านทักษะ' && $form_type == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_skiil.php");   
						}
						if ($form_side == 'ด้านจิตวิทยา' && $form_type == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_psychology.php"); //ได้แล้ว 
						}
						//--------------------------------------------------------//
						if ($form_side2 == 'ด้านทักษะ' && $form_type2 == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_skill2.php");   //ได้แล้ว 
						}
						if ($form_side2 == 'ด้านจิตวิทยา' && $form_type2 == 'ความคิดเห็น') {
							include("career/dashboard_highcharts_psychology2.php"); //ได้แล้ว 
						}
						if ($form_side2 == 'ด้านทักษะ' && $form_type2 == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_skill2.php"); //ได้แล้ว
						}
						if ($form_side2 == 'ด้านจิตวิทยา' && $form_type2 == 'เปรียบเทียบ') {
							include("career/dashboard_highcharts_psychology2.php"); //ได้แล้ว 
						}
					} 
					
					?> 
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

	<?php
		if (isset($_REQUEST['q_id']) && isset($_REQUEST['q_id2'])) {
	?>
		<div class="col-md-3"> 
			<a href="career-advice.php?career=student_manage_module">
				<button class="btn btn-secondary" style = "width: 100%;">จัดการแผนการเรียน</i></button></a>
			</a> 
		</div>
	<?php
		}
	?>
</div>
