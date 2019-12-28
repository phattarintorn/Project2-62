<div class = "card">
    <div class = "card-header">
        <strong class="card-title">แผนการเรียน</strong>
    </div>
    <div class = "card-body">

        <?php include('career/career_module.php') ?>

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
<script>

    var MAJOR = [
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
                value : 1,
                text: '234010 - Information Technology Foundation Module'
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
                value : 55,
                text: '213101 - English for Communication I'
            },
            {
                value : 3,
                text: '204030 - Introduction to Data Science Professionals Module'
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
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 56,
                text: '213102 - English for Communication II'
            },
            {
                value : 57,
                text: '213203 - English for Academic purposes'
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
                value : -1,
                text: 'select'
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
                value : 58,
                text: '213204 - English for Specific purposes'
            },
            {
                value : 59,
                text: '213205 - English for careers'
            },
            {
                value : 61,
                text: 'XXXXXX - Free Eelective Course'
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
                text: '234991 - Project in Information Technology Module'
            },
            {
                value : 5,
                text: '234992 - Project in Information Technology Module'
            },
            {
                value : 39,
                text: '204491 - Cooperative Education I'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 5,
                text: '234993 - Project in Information Technology Module'
            },
            {
                value : 4,
                text: '203325 - Go-to-Market Strategies for Innovative Product and Service'
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
                value : 4,
                text: '203324 - Go-to-Market Strategies for Innovative Product and Service'
            },
            {
                value : 4,
                text: '2234043 - Go-to-Market Strategies for Innovative Product and Service'
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
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 38,
                text: '204490 - Pre-Cooperative Education'
            },
            {
                value : 0,
                text: ''
            },
        ],
        [
            {
                value : 0,
                text: 'ปีการศึกษาที่ 4'
            },
            {
                value : 61,
                text: 'XXXXXX - Free Eelective Course'
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

    var MINOR = [
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
                value : 1,
                text: '234010 - Information Technology Foundation Module'
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
                value : 55,
                text: '213101 - English for Communication I'
            },
            {
                value : 3,
                text: '204030 - Introduction to Data Science Professionals Module'
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
                value : 60,
                text: 'XXXXXX - General Education'
            },
            {
                value : 56,
                text: '213102 - English for Communication II'
            },
            {
                value : 57,
                text: '213203 - English for Academic purposes'
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
                value : -1,
                text: 'select'
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
                value : 58,
                text: '213204 - English for Specific purposes'
            },
            {
                value : 59,
                text: '213205 - English for careers'
            },
            {
                value : 61,
                text: 'XXXXXX - Free Eelective Course'
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
                text: '234991 - Project in Information Technology Module'
            },
            {
                value : 5,
                text: '234992 - Project in Information Technology Module'
            },
            {
                value : 38,
                text: '205395 - Pre-Cooperative Education'
            },
        ],
        [
            {
                value : 0,
                text: ''
            },
            {
                value : 5,
                text: '234993 - Project in Information Technology Module'
            },
            {
                value : 4,
                text: '203325 - Go-to-Market Strategies for Innovative Product and Service'
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
                value : 4,
                text: '203324 - Go-to-Market Strategies for Innovative Product and Service'
            },
            {
                value : 4,
                text: '2234043 - Go-to-Market Strategies for Innovative Product and Service'
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
                text: 'ปีการศึกษาที่ 4'
            },
            {
                value : 39,
                text: '205492 - Cooperative Education I'
            },
            {
                value : 61,
                text: 'XXXXXX - Free Eelective Course'
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

    function select_module(obj) {
        $.ajax({
            url: "career/student_select_module.php",
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                generate_module(response, obj)
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

    function generate_module(input, obj) {
        $('#form_module').empty();
        
        let str = ''
        let year = 0
        let order = 1
        for (i = 0; i < obj.length; i++) {
            str += '<div class = "row" style = "margin: 20px;">'

            if ( i%4 == 1 ) {
                order = 1
                year ++
            }

            for (j = 0; j < obj[i].length; j++) {
                str += '<div class = "col-md-3">'
                let name = 'module_' + order + '_' + year + '_' + j
                let value = obj[i][j].value
                let text = obj[i][j].text
                
                if (value == 0) {
                    if (text != '')
                        str += '<strong class = "card-title">'+ text +'</strong>'
                } else if (value == -1){
                    str += '<select class="form-control" name = "'+ name +'" required>'
                    str += '<option value = "">-- SELECT MODULE --</option>'
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

    $(document).ready(function(){
        $('select').on('change', function(event) {
            var prev = $(this).data('previous');
            $('select').not(this).find('option[value="'+prev+'"]').show();    
            var value = $(this).val();
            if (value != '') {
                $(this).data('previous',value); 
                $('select').not(this).find('option[value="'+value+'"]').hide();
            }
        });

        // select module in database
        for (i = 0; i < module.length; i++) {
            let name = 'module_' + module[i].no + '_' + module[i].year + '_' + module[i].semester
            $('select[name="' + name + '"]').find('option[value="' + module[i].module + '"]').attr("selected",true);
        }

    });

</script>

<?php
    echo '<script>';

    $sql = 'SELECT * FROM MAPPING_STUDENT_PLAN WHERE STUDENT_ID = ' . $_SESSION["USER_ID"];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["STUDENT_PLAN"] == 'GENERAL') {
        echo 'select_module(' . $row["PLAN_TYPE"] . ');';
    }

    $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE WHERE STUDENT_ID = ' . $_SESSION["USER_ID"];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $data_response[] = array(
                "module" => $row["MODULE_ID"],
                "no" => $row["MODULE_NO"],
                "year" => $row["MODULE_YEAR"],
                "semester" => $row["MODULE_SEMESTER"],
            );
        }
        
        echo 'let module = ' . json_encode($data_response) . '';

    }


    echo '</script>';
?>