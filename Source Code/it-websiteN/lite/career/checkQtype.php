<?php
$q_type = $row['q_type'];

if ($q_type == "Q1") { 
	echo "ถามระดับความคิดเห็น";

}elseif ($q_type == "Q2") { 
	echo "ถามเปรียบเทียบ";

}elseif ($q_type == "Q3") { 
	echo "เลือกเพียงหนึ่งคำตอบ";


}elseif ($q_type == "Q4") { 
	echo "เลือกหลายคำตอบ";

}else{
} 
?>
