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
<div class="col-md-2"> 
	<a href="career-advice.php?career=tables_history">
		<button class="btn btn-secondary">กลับ</i></button></a>
	</a> 
</div>