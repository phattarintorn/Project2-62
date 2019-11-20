<?php
if ($result->num_rows > 0) 
{ 
  while($row = $result->fetch_assoc()) 
  { 

    echo "<tr>"; 
    echo '<td>' . $row['q_day'] . '</td>';
    echo '<td><center>' . $row['q_group'] . '</center></td>';
    echo '<td>' . $row['q_side'] . '</td>'; 
    // echo '<td><center>
    // <a title="ทำแบบทดสอบ"  class="btn-link ti-write" href="career-advice.php?career=insert_formtest&q_group='.$row['q_group'].'"></a>
    // </center></td>';
    echo '<td><center>
    <a title="ทำแบบทดสอบ"  class="btn-link ti-write" href="career-advice.php?career=check_formtest&q_group='.$row['q_group'].'"></a>
    </center></td>';
    // <a title="ทำแบบทดสอบ"  class="btn-link ti-write" href="career-advice.php?career=check_formtest&q_group='.$row['q_group'].'"></a>
    //  echo '<td><center>
    // <a title="ทำแบบทดสอบ"  class="btn-link ti-write" href="career-advice.php?career=check_form&q_group='.$row['q_group'].'"></a>
    // </center></td>';

    echo "</tr>"; 
}    
}

?>
