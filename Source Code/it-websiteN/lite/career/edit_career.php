<?php
    include("db/db.php");
    $conn->query("SET NAMES UTF8");
    $CAREER_ID = $_GET["career_id"];
   
?>
<form action="career-advice.php?career=edit_save_career" method="POST" class="form-horizontal" enctype="multipart/form-data">  
<div class = "card">
    <div class = "card-header">
        <strong class="card-title">รายละเอียดอาชีพ</strong>
    </div>
    <div class = "row card-body" style = "padding: 20px;">
        <div class = "col-md-3">
            <div class = "card" style = "height: auto;" align = "center">
                <?php
                    echo '<input type="hidden" id="career_id" name="career_id" value="'.$CAREER_ID.'">';
                    $sql = "SELECT * FROM M_CAREER WHERE CAREER_ID = $CAREER_ID";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class = "card-body" style = "padding: 15px;">';
                            echo '<img style="width:35%; height:45%; margin-bottom: 10px;" src="images/career/character/' . $row["CAREER_IMAGE"] . '">';
                            echo '<br>';
                            echo '<input type="file" name="career_character" class="form-control" >';
                            echo '<br>';
                            echo '<br>';
                            echo '<div align="left"><a>ชื่ออาชีพ</a></div>';
                            echo '<input type="text" name="career_name" class="form-control" value="'.$row["CAREER_NAME"].'">';
                            echo '<br>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class = "col-md-9">
            <div class = "card" align = "center">
                <div class = "card-header">
                    <strong class="card-title">Module</strong>
                </div>
                <div class = "row card-body" style = "padding: 20px;">
                    <?php
                            echo '<div class = "col-md-12 text-left">';
                            $sql = "SELECT * FROM m_module WHERE MODULE_ID";
                            $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                              { $i=0;
                                while($row = $result->fetch_assoc()) 
                                {
                                  $i = $i+1;
                                  echo ' 
                                  <div class="row ">
                                    <div class="col-md-1 center-block">
                                      <input type="checkbox" name="choice_module'.$i.'" id="choice_module'.$i.'" value="'. $row["MODULE_ID"].'"/>
                                      <label for="choice_module'.$i.'" ></label></br>
                                    </div>';
                                  echo '<div class="col">';
                                  echo $row["MODULE_CODE"]." ".$row["MODULE_NAME"];
                                  echo '</div>';  
                                  echo '</div>';  
                                }
                                $count = $i;
                                echo '<input type="hidden" id="count_career" name="count_career" value="'.$count.'">';
                              }
                            echo '</div>';                       
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-info">บันทึก</button>
        </div>
        
    </div>
</div>
</form>
<div class="col-md-2">
	<button class="btn btn-secondary " onclick="window.location='career-advice.php?career=add_career'">กลับ</button>
</div>    
<?php 
    $sql = "SELECT * FROM MAPPING_CAREER_MODULE AS MAPP
    LEFT JOIN M_MODULE AS M ON MAPP.MODULE_ID = M.MODULE_ID
    WHERE MAPP.CAREER_ID = $CAREER_ID ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           for($j = 1;$j<=$count;$j++)
           {
               echo ("<script = 'javascript'>var module_id = document.getElementById('choice_module".$j."').value

                    if('".$row["MODULE_ID"]."'== module_id)
                    {
                        document.getElementById('choice_module".$j."').checked = true;
                    }
               </script>");
           }
        }
    }
    echo ("<script = 'javascript'>alert('บันทึกสำเร็จ'".$count.") 
        </script>");
?>