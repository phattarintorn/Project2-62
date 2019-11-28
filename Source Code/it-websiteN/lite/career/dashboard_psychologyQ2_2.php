<?php 
$sql = "SELECT * FROM MAPPING_STUDENT_REPORT AS R
  LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
  LEFT JOIN M_GROUP_QUESTION AS G ON R.QUESTION_ID = G.QUESTION_ID
  WHERE R.STUDENT_ID = " . $_SESSION['USER_ID'] . " AND R.CREATE_DATE = '$form_date' 
  AND G.QUESTION_PART = '$form_side2' ORDER BY R.MAPPING_STUDENT_REPORT_ID";

$result = $conn->query($sql); 
$sumMax =0 ;

if ($result->num_rows > 0) 
{ 
  $i = 0;
  ?>
  <div class="card">
 
    <div class="card-header">
      <strong class="card-title"><u></u> วัดด้านจิตวิทยา</strong>
    </div>

    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"><center>อันดับที่</center></th>
            <th scope="col">อาชีพ</th>
            <th scope="col"></th>
            <th scope="col">ร้อยละ</th>
            <tbody>   
              <?php  
              while($row = $result->fetch_assoc()) 
              { 
                $i = $i +1;  
                  echo "<tr>";
                  if ($i <= "5") {
                   echo '<td><center><h3><br>' . $i . '</h3></center></td>';
                   echo '<td><br><br>' .$row['CAREER_NAME']. '</td>'; 
                   echo '<td>';
                   echo '
                   <img style="width:35%;height:45%" src="images/career/character/'.$row["CAREER_IMAGE"].'">';
                   echo '</td>';
                   $sumMax = $row['RAW_SCORE'] + $sumMax ; 
                    //TOP 5
                   $Max_score = ($row['RAW_SCORE'] / $row['TOP_SCORE'] ) *100; 
                   echo '<td><h3><br>' .number_format($Max_score, 2, '.', ' '). '</h3></td>';
                 }
                 echo "</tr>"; 
              } 
             ?>
           </tr>
         </thead>
       </tbody>
     </table>
   </div>

 </div>
 <?php    
} 
echo '<hr>';  
include("dashboard_highcharts_psychology2.php");  
?>
