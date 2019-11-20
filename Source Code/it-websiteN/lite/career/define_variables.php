<?php
include("db/db.php"); 

if (isset($_POST["q1_group"])) {
	$q_group = $_POST["q1_group"]; 
	$q1_id = $_POST["q1_id"]; 
	$q_id = $_POST["q_id"]; 
	$q_no = $_POST["q_no"]; 
	$career = $_POST["career"];  

	for ($i=1; $i <= $q_no; $i++) { 
		if (isset($_POST["q1_no$i"])) {
			# code...
			$q1_no_i = $_POST["q1_no$i"]; 
			$q1_id_i = $_POST["q1_id$i"]; 
			// echo 'q1_id_i'.$q1_id_i."<br>";

			if($q1_no_i == "1"){
				if (isset($_POST["choice1"])) {
					$choice1 = $_POST["choice1"]; 
					// echo $choice1; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q1_no_i == "2"){
				if (isset($_POST["choice2"])) {
					$choice2 = $_POST["choice2"]; 
					// echo $choice2;  

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "3"){
				if (isset($_POST["choice3"])) {
					$choice3 = $_POST["choice3"]; 
					// echo $choice3; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "4"){
				if (isset($_POST["choice4"])) {
					$choice4 = $_POST["choice4"]; 
					// echo $choice4; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "5"){
				if (isset($_POST["choice5"])) {
					$choice5 = $_POST["choice5"]; 
					// echo $choice5; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "6"){
				if (isset($_POST["choice6"])) {
					$choice6 = $_POST["choice6"]; 
					// echo $choice6; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "7"){
				if (isset($_POST["choice7"])) {
					$choice7 = $_POST["choice7"]; 
					// echo $choice7; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "8"){
				if (isset($_POST["choice8"])) {
					$choice8 = $_POST["choice8"]; 
					// echo $choice8; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "9"){
				if (isset($_POST["choice9"])) {
					$choice9 = $_POST["choice9"]; 
					// echo $choice9; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "10"){
				if (isset($_POST["choice10"])) {
					$choice10 = $_POST["choice10"]; 
					// echo $choice10; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "11"){
				if (isset($_POST["choice11"])) {
					$choice11 = $_POST["choice11"]; 
					// echo $choice11; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "12"){
				if (isset($_POST["choice12"])) {
					$choice12 = $_POST["choice12"]; 
					// echo $choice12; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "13"){
				if (isset($_POST["choice13"])) {
					$choice13 = $_POST["choice13"]; 
					// echo $choice13; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "14"){
				if (isset($_POST["choice14"])) {
					$choice14 = $_POST["choice14"]; 
					// echo $choice14; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "15"){
				if (isset($_POST["choice15"])) {
					$choice15 = $_POST["choice15"]; 
					// echo $choice15; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "16"){
				if (isset($_POST["choice16"])) {
					$choice16 = $_POST["choice16"]; 
					// echo $choice16; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 


			if($q1_no_i == "17"){
				if (isset($_POST["choice17"])) {
					$choice17 = $_POST["choice17"]; 
					// echo $choice17; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "18"){
				if (isset($_POST["choice18"])) {
					$choice18 = $_POST["choice18"]; 
					// echo $choice18; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "19"){
				if (isset($_POST["choice19"])) {
					$choice19 = $_POST["choice19"]; 
					// echo $choice19; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "20"){
				if (isset($_POST["choice20"])) {
					$choice20 = $_POST["choice20"]; 
					// echo $choice20; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "21"){
				if (isset($_POST["choice21"])) {
					$choice21 = $_POST["choice21"]; 
					// echo $choice21; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "22"){
				if (isset($_POST["choice22"])) {
					$choice22 = $_POST["choice22"]; 
					// echo $choice22; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "23"){
				if (isset($_POST["choice23"])) {
					$choice23 = $_POST["choice23"]; 
					// echo $choice23; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "24"){
				if (isset($_POST["choice24"])) {
					$choice24 = $_POST["choice24"]; 
					// echo $choice24; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "25"){
				if (isset($_POST["choice25"])) {
					$choice25 = $_POST["choice25"]; 
					// echo $choice25; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "26"){
				if (isset($_POST["choice26"])) {
					$choice26 = $_POST["choice26"]; 
					// echo $choice26; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "27"){
				if (isset($_POST["choice27"])) {
					$choice27 = $_POST["choice27"]; 
					// echo $choice27; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 


			if($q1_no_i == "28"){
				if (isset($_POST["choice28"])) {
					$choice28 = $_POST["choice28"]; 
					// echo $choice28; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "29"){
				if (isset($_POST["choice29"])) {
					$choice29 = $_POST["choice29"]; 
					// echo $choice29; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "30"){
				if (isset($_POST["choice30"])) {
					$choice30 = $_POST["choice30"]; 
					// echo $choice30; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "31"){
				if (isset($_POST["choice31"])) {
					$choice31 = $_POST["choice31"]; 
					// echo $choice31; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "32"){
				if (isset($_POST["choice32"])) {
					$choice32 = $_POST["choice32"]; 
					// echo $choice32; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "33"){
				if (isset($_POST["choice33"])) {
					$choice33 = $_POST["choice33"]; 
					// echo $choice33; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "34"){
				if (isset($_POST["choice34"])) {
					$choice34 = $_POST["choice34"]; 
					// echo $choice34; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "35"){
				if (isset($_POST["choice35"])) {
					$choice35 = $_POST["choice35"]; 
					// echo $choice35; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 

			if($q1_no_i == "36"){
				if (isset($_POST["choice36"])) {
					$choice36 = $_POST["choice36"]; 
					// echo $choice36; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "37"){
				if (isset($_POST["choice37"])) {
					$choice37 = $_POST["choice37"]; 
					// echo $choice37; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "38"){
				if (isset($_POST["choice38"])) {
					$choice38 = $_POST["choice38"]; 
					// echo $choice38; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "39"){
				if (isset($_POST["choice39"])) {
					$choice39 = $_POST["choice39"]; 
					// echo $choice39; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "40"){
				if (isset($_POST["choice40"])) {
					$choice40 = $_POST["choice40"]; 
					// echo $choice40; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "41"){
				if (isset($_POST["choice41"])) {
					$choice41 = $_POST["choice41"]; 
					// echo $choice41; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 

				} 
			} 

			if($q1_no_i == "42"){
				if (isset($_POST["choice42"])) {
					$choice42 = $_POST["choice42"]; 
					// echo $choice42; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			}
			if($q1_no_i == "43"){
				if (isset($_POST["choice43"])) {
					$choice43 = $_POST["choice43"]; 
					// echo $choice43; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "44"){
				if (isset($_POST["choice44"])) {
					$choice44 = $_POST["choice44"]; 
					// echo $choice44; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "45"){
				if (isset($_POST["choice45"])) {
					$choice45 = $_POST["choice45"]; 
					// echo $choice45; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "46"){
				if (isset($_POST["choice46"])) {
					$choice46 = $_POST["choice46"]; 
					// echo $choice46; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "47"){
				if (isset($_POST["choice47"])) {
					$choice47 = $_POST["choice47"]; 
					// echo $choice47; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "48"){
				if (isset($_POST["choice48"])) {
					$choice48 = $_POST["choice48"]; 
					// echo $choice48; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
			if($q1_no_i == "49"){
				if (isset($_POST["choice49"])) {
					$choice49 = $_POST["choice49"]; 
					// echo $choice49; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 
			if($q1_no_i == "50"){
				if (isset($_POST["choice50"])) {
					$choice50 = $_POST["choice50"]; 
					// echo $choice50; 

					$sql = "UPDATE `q1`  SET `career`='".$career."' WHERE q1_id=".$q1_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				} 
			} 
		}
	}


}