<?php
    include("db/db.php");
    $conn->query("SET NAMES UTF8");

    $sql = "SELECT * FROM MAPPING_STUDENT_DATA AS MAPP
        LEFT JOIN M_CAREER AS C ON MAPP.CAREER_ID = C.CAREER_ID
        WHERE MAPP.STUDENT_ID = " . $_SESSION["USER_ID"];
        
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $CAREER_ID = $row["CAREER_ID"];

            ?>

            <div class = "card">
                <div class = "card-header">
                    <strong class="card-title">แผนการเรียน</strong>
                </div>
                <div class = "card-body">
                    <div class = "row" style = "margin: 20px;">
                        <div class = "col-md-3">
                            <div class = "card" style = "height: auto;" align = "center">
                                <div class = "card-body" style = "padding: 15px;">
                                    <img style="width:auto; height:20vh; margin-bottom: 10px;" src="images/career/character/<?php echo $row["CAREER_IMAGE"] ?>">
                                    <br>
                                    <?php echo $row["CAREER_NAME"] ?>
                                </div>
                            </div>
                        </div>
                        <div class = "col-md-9">
                            <div class = "card" align = "center">
                                <div class = "card-header">
                                    <strong class="card-title">แผนการเรียน</strong>
                                </div>
                                <div class = "row card-body" style = "padding: 20px;">
                                    <?php
                                        for ( $i = 1; $i <= 3; $i++ ) {
                                            echo '<div class = "col-md-4">';
                                            echo '<div class = "card" align = "center">';

                                            $sql = "SELECT * FROM MAPPING_CAREER_MODULE AS MAPP
                                                LEFT JOIN M_MODULE AS M ON MAPP.MODULE_ID = M.MODULE_ID
                                                LEFT JOIN MAPPING_MODULE_SEMESTER AS S ON MAPP.MODULE_ID = S.MODULE_ID
                                                WHERE MAPP.CAREER_ID = $CAREER_ID AND MODULE_SEMESTER = $i";

                                            $result = $conn->query($sql);

                                            echo '<div class = "card-header">';
                                            echo '<strong class="card-title">เทอม ' . $i . '</strong>';
                                            echo '</div>';
                                            echo '<div class = "card-body" style = "padding: 20px;">';

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo $row["MODULE_CODE"];
                                                    echo ' - ';
                                                    echo $row["MODULE_NAME"];
                                                    echo '<br>';
                                                    echo '<br>';
                                                }
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row" style = "margin: 20px;">
                        <div class = "card" style = "width: 100vw;">
                            <div class = "card-body">
                                <form action="career-advice.php?career=student_update_module" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <strong class = "card-title">เทอม 1</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <strong class = "card-title">เทอม 2</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <strong class = "card-title">เทอม 3</strong>
                                        </div>
                                    </div>
                                    
                                    <!-- YEAR 1 ROW 1 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                            <strong class = "card-title">ปีการศึกษา 1</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_1_1">
                                                <option value = "4">204040 - English for Digital Technology Professionals Module</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_1_2">
                                                <option value = "2">204020 - Introduction to Software Developer Professionals Module</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_1_3" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 1 ROW 2 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_1_1">
                                                <option value = "1">204040 - Information Technology Foundation Module</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_1_2">
                                                <option value = "3">204030 - Information Technology Foundation Module</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_1_3" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 1 ROW 3 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_1_1">
                                                <option value = "55">213101 - English for Communication I</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_1_2">
                                                <option value = "56">213102 - English for Communication II</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_1_3">
                                                <option value = "57">213103 - English for Academic purposes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 1 ROW 4 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_4_1_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_4_1_3" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- YEAR 2 ROW 1 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                            <strong class = "card-title">ปีการศึกษา 2</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_2_1" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_2_2" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_2_3" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 2 ROW 2 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_2_1" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_2_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_2_3" required>
                                                <?php include('student_select_module.php'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 2 ROW 3 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_2_1" >
                                                <option value = "58">213104 - English for Specific purposes</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_2_2" >
                                                <option value = "59">213105 - English for careers</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_2_3" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 2 ROW 4 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_4_2_1" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_4_2_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                    </div>
                                    
                                    <!-- YEAR 3 ROW 1 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                            <strong class = "card-title">ปีการศึกษา 3</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_3_1" >
                                                <option value = "5">234990 - Project in Information Technology Module</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_3_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_3_3" >
                                                <option value = "60">XXXXXX - Free Eelective Course</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 3 ROW 2 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_3_1" >
                                                <option value = "62">205305 - Entrepreneurship and New Venture Creation</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_3_2" >
                                                <option value = "63">205306 - Go-to-Market Strategies for Innovative Product and Service</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_2_3_3" >
                                                <option value = "64">205307 - Business Plan and Financing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 3 ROW 3 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_3_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_3_3_3" >
                                                <option value = "38">204490 - Pre-Cooperative Education</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- YEAR 3 ROW 4 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_4_3_3" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                    </div>
                                                                    
                                    <!-- YEAR 4 ROW 1 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-3">
                                            <strong class = "card-title">ปีการศึกษา 4</strong>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_4_1" >
                                                <option value = "39">204491 - Cooperative Education I</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                            <select class="form-control" name = "module_1_4_2" >
                                                <option value = "60">XXXXXX - General Education</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-3">
                                        </div>
                                    </div>
                                    <!-- YEAR 4 ROW 2 -->
                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-12">
                                        </div>
                                    </div>

                                    <div class = "row" style = "margin: 20px;">
                                        <div class = "col-md-8">
                                        </div>
                                        <div class = "col-md-2">
                                            <button class="btn btn-success" style = "width:100%;">บันทึก</button></a> 
                                        </div>
                                        <div class = "col-md-2">
                                            <a href="career-advice.php?career=student_manage_module" class="btn btn-warning" style = "width:100%;">ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>
<script>
    let x = [
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: 'เทอม 1'
            },
            {
                value : 0,
                text: 'เทอม 2'
            },
            {
                value : 0,
                text: 'เทอม 3'
            },
        ],
        [
            {
                value : 0,
                text: 'ปีการศึกษาที่ 1'
            },
            {
                value : 4,
                text: '204040 - English for Digital Technology Professionals Module'
            },
            {
                value : 2,
                text: '204020 - Introduction to Software Developer Professionals Module'
            },
            {
                value : -1,
                text: 'select'
            },
        ],
    ]

    // console.log(x)

    for (i = 0; i < x.length; i++) {
        let test = '<div class = "row" style = "margin: 20px;">'
        for (j = 0; j < x[i].length; j++) {
            test += '<div class = "col-md-3">'
            let name = 'module_' + '_' + '_' + j
            let value = x[i][j].value
            let text = x[i][j].text
            
            if (value == 0) {
                if (text != '')
                    test += '<strong class = "card-title">'+ text +'</strong>'
            } else if (value == -1){
                test += '<select class="form-control" name = "module_1_1_3" required>'
                test += 'include("student_select_module.php");'
                test += '</select>'
            } else {
                test += '<select class="form-control" name = "module_1_1_3">'
                let log = '<option value = "'+ value +'">'+ text +'</option>'
                test += log
                test += '</select>'
            }

            test += '</div>'
        }
        test += '</div>'
        console.log(test)
    }

    function selectModule() {
        let input = { id: 1 }
        $.ajax({
            url: "career/student_select_module.php",
            method: "POST",
            data: JSON.stringify(input),
            dataType: "JSON",
            success: function(response) {
                for (x = 0; x < response.length; x++) {
                    console.log(response[x])
                }
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

</script>