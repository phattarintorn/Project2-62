<?php
include("db/db.php"); 

if (isset($_POST["q2_group"])) {
	$q_group = $_POST["q2_group"]; 
	$q2_id = $_POST["q2_id"]; 
	$q_id = $_POST["q_id"]; 
	$q_no = $_POST["q_no"]; 
	$career = $_POST["career"];  
	$subject = $_POST["subject"];  

	for ($i=1; $i <= $q_no; $i++) { 
		
		if (isset($_POST["q2_no$i"])) {
			# code...
			$q2_no_i = $_POST["q2_no$i"]; 
			$q2_id_i = $_POST["q2_id$i"]; 
			// echo 'q2_id_i'.$q2_id_i."<br>";

			if($q2_no_i == "1"){
				if (isset($_POST["choice1"])) {
					$choice1 = $_POST["choice1"]; 
					// echo $choice1; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "1"){
				if (isset($_POST["choice2"])) {
					$choice2 = $_POST["choice2"]; 
					// echo $choice2;  

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "2"){
				if (isset($_POST["choice3"])) {
					$choice3 = $_POST["choice3"]; 
					// echo $choice3; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "2"){
				if (isset($_POST["choice4"])) {
					$choice4 = $_POST["choice4"]; 
					// echo $choice4; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "3"){
				if (isset($_POST["choice5"])) {
					$choice5 = $_POST["choice5"]; 
					// echo $choice5; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "3"){
				if (isset($_POST["choice6"])) {
					$choice6 = $_POST["choice6"]; 
					// echo $choice6; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "4"){
				if (isset($_POST["choice7"])) {
					$choice7 = $_POST["choice7"]; 
					// echo $choice7; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "4"){
				if (isset($_POST["choice8"])) {
					$choice8 = $_POST["choice8"]; 
					// echo $choice8; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "5"){
				if (isset($_POST["choice9"])) {
					$choice9 = $_POST["choice9"]; 
					// echo $choice9; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "5"){
				if (isset($_POST["choice10"])) {
					$choice10 = $_POST["choice10"]; 
					// echo $choice10; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "6"){
				if (isset($_POST["choice11"])) {
					$choice11 = $_POST["choice11"]; 
					// echo $choice11; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;

					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "6"){
				if (isset($_POST["choice12"])) {
					$choice12 = $_POST["choice12"]; 
					// echo $choice12; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;

					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "7"){
				if (isset($_POST["choice13"])) {
					$choice13 = $_POST["choice13"]; 
					// echo $choice13; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "7"){
				if (isset($_POST["choice14"])) {
					$choice14 = $_POST["choice14"]; 
					// echo $choice14; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "8"){
				if (isset($_POST["choice15"])) {
					$choice15 = $_POST["choice15"]; 
					// echo $choice15; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "8"){
				if (isset($_POST["choice16"])) {
					$choice16 = $_POST["choice16"]; 
					// echo $choice16; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "9"){
				if (isset($_POST["choice17"])) {
					$choice17 = $_POST["choice17"]; 
					// echo $choice17; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "9"){
				if (isset($_POST["choice18"])) {
					$choice18 = $_POST["choice18"]; 
					// echo $choice18; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

			if($q2_no_i == "10"){
				if (isset($_POST["choice19"])) {
					$choice19 = $_POST["choice19"]; 
					// echo $choice19; 

					$sql = "UPDATE `q2`  SET `career`='".$career."',`subject`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			} 

			if($q2_no_i == "10"){
				if (isset($_POST["choice20"])) {
					$choice20 = $_POST["choice20"]; 
					// echo $choice20; 

					$sql = "UPDATE `q2`  SET `career2`='".$career."',`subject2`='".$subject."' WHERE q2_id=".$q2_id_i;
					
					if (mysqli_query($conn, $sql)) {
						echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
							window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
					} 
				}
			}

		}
	} 
}