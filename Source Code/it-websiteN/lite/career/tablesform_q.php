<?php
if ($result->num_rows > 0) 
{ 
  while($row = $result->fetch_assoc()) 
  { 
    echo "<tr>";
    echo '<td>' . $row['q_day'] . '</td>';
    echo '<td>' . $row['q_group'] . '</td>'; 
    echo '<td>'; 
    include("checkQstatus_using.php"); 
    echo '</td>';
    echo '<td><center><a title="รายละเอียดแบบสอบถาม"  class="btn-link ti-clipboard" href="career-advice.php?career=check_Qresult&q_group='.$row['q_group'].'"></a>
    <a title="แก้ไข"  class="btn-link ti-write" href="career-advice.php?career=in_Qgroup&q_group='.$row['q_group'].'"></a>';

    if ($row["status_using"]=="0") { 
        echo '<input type="hidden" name="status_using" value="1">';
        echo '<a title="ปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_using&q_group='.$row['q_group'].'&status_using=1"> </a> ';
    }else{
        echo '<input type="hidden" name="status_using" value="0">';
        echo '<a title="เปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_using&q_group='.$row['q_group'].'&status_using=0"></a> ';
    }
    echo '</center></td>';
    echo "</tr>"; 
}    
}
?>
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>