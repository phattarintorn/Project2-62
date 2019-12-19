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
                                <form action="career-advice.php?career=student_update_module" id = "form_module" method="post" enctype="multipart/form-data" class="form-horizontal">

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
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 1,
                text: '204040 - Information Technology Foundation Module'
            },
            {
                value : 3,
                text: '204030 - Information Technology Foundation Module'
            },
            {
                value : -1,
                text: 'select'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 55,
                text: '213101 - English for Communication I'
            },
            {
                value : 56,
                text: '213102 - English for Communication II'
            },
            {
                value : 57,
                text: '213103 - English for Academic purposes'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
        ],
        [
            {
                value : 0,
                text: 'ปีการศึกษาที่ 2'
            },
            {
                value : -1,
                text: 'select'
            },
            {
                value : -1,
                text: 'select'
            },
            {
                value : -1,
                text: 'select'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : -1,
                text: 'select'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : -1,
                text: 'select'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 58,
                text: '213104 - English for Specific purposes'
            },
            {
                value : 59,
                text: '213105 - English for careers'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 0,
                text: ''
            },
        ],
        [
            {
                value : 0,
                text: 'ปีการศึกษาที่ 3'
            },
            {
                value : 5,
                text: '234990 - Project in Information Technology Module'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 62,
                text: '205305 - Entrepreneurship and New Venture Creation'
            },
            {
                value : 63,
                text: '205306 - Go-to-Market Strategies for Innovative Product and Service'
            },
            {
                value : 64,
                text: '205307 - Business Plan and Financing'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 38,
                text: '204490 - Pre-Cooperative Education'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
        ],
        [
            {
                value : 0,
                text: 'ปีการศึกษาที่ 4'
            },
            {
                value : 39,
                text: '204491 - Cooperative Education I'
            },
            {
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 0,
                text: ''
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
            {
                value : 0,
                text: ''
            },
        ],
    ]

    function select_module() {
        $.ajax({
            url: "career/student_select_module.php",
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                generate_module(response)
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

    function generate_module(input) {
        let str = ''
        let year = 0
        let order = 1
        for (i = 0; i < x.length; i++) {

            if ( i%4 == 1 ) {
                order = 1
                year ++
            }

            str += '<div class = "row" style = "margin: 20px;">'
            for (j = 0; j < x[i].length; j++) {
                str += '<div class = "col-md-3">'
                let name = 'module_' + order + '_' + year + '_' + j
                let value = x[i][j].value
                let text = x[i][j].text
                
                if (value == 0) {
                    if (text != '')
                        str += '<strong class = "card-title">'+ text +'</strong>'
                } else if (value == -1){
                    str += '<select class="form-control" name = "'+ name +'" required>'

                    for (q = 0; q < input.length; q++) {
                        if ( input[q].semester == j ) {
                            let value_module = input[q].id
                            let text_module = input[q].code + ' - ' + input[q].name
                            str += '<option value = "'+ value_module +'">'+ text_module +'</option>'
                        }
                    }

                    str += '</select>'
                } else {
                    str += '<select class="form-control" name = "'+ name +'">'
                    str += '<option value = "'+ value +'">'+ text +'</option>'
                    str += '</select>'
                }
                
                str += '</div>'
            }

            order ++

            str += '</div>'

        }

        str += '<div class = "row" style = "margin: 20px;">'
        str += '<div class = "col-md-8">'
        str += '</div>'
        str += '<div class = "col-md-2">'
        str += '<button class="btn btn-success" style = "width:100%;">บันทึก</button></a>' 
        str += '</div>'
        str += '<div class = "col-md-2">'
        str += '<a href="career-advice.php?career=student_manage_module" class="btn btn-warning" style = "width:100%;">ย้อนกลับ</a>'
        str += '</div>'
        str += '</div>'

        $('#form_module').append(str);

    }

    select_module()

</script>