<?php
	$q_type = $row['QUESTION_TYPE'];

	if ($q_type == "ความคิดเห็น") { 
		echo "ถามระดับความคิดเห็น";

	}elseif ($q_type == "เปรียบเทียบ") { 
		echo "ถามเปรียบเทียบ";

	}else{
	} 
?>
