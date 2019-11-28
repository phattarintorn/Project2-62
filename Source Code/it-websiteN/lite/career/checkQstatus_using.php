<?php
$status_using = $row['QUESTION_STATUS'];

if ($status_using == "0") { 
	echo "เปิดใช้";
}elseif ($status_using == "1") { 
	echo "ปิดใช้";
}else{
} 
?>
