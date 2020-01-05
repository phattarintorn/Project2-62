<div class = "card">
    <div class = "card-header">
        <div class = "row">
            <div class = "col-md-12" style = "padding-top: 1vh;">
                <strong class="card-title">แผนการเรียน</strong>
            </div>
        </div>
    </div>
    <div class = "card-body">

        <?php include('career/career_module.php') ?>

        <form action="career-advice.php?career=student_update_life_module" id = "form_module" method="post" enctype="multipart/form-data" class="form-horizontal">

        </form>
    </div>
</div>

<script>
    function generate_module(obj) {
        for (i = 0; i < obj.length; i++) {
            str = '<div class = "row" style = "margin: 20px;">'
            str += '<div class = "col-md-2">'
            let datetime = obj[i].date
            let date = datetime.split(" ");
            str += date[0]
            str += '</div>'
            str += '<div class = "col-md-8">'
            str += '<label>'
            str += obj[i].code + ' - ' + obj[i].name
            str += '</label>'
            str += '</div>'
            str += '<div class = "col-md-2">'
            str += '</div>'
            str += '</div>'

            $('#form_module').append(str);
        }
    }

    function select_module(obj) {
        str = '<div class = "row" style = "margin: 20px;">'
        str += '<div class = "col-md-2"/>'
        str += '<div class = "col-md-8">'
        str += '<select class="form-control" name = "module" required>'
        str += '<option value = "">-- SELECT MODULE --</option>'
        for (j = 0; j < obj.length; j++) {
                let value_module = obj[j].id
                let text_module = obj[j].code + ' - ' + obj[j].name
                str += '<option value = "'+ value_module +'">'+ text_module +'</option>'
        }
        str += '</select>'
        str += '</div>'
        str += '<div class = "col-md-2">'
        str += '<button class="btn btn-success" style = "width:100%;">บันทึก</button></a>' 
        str += '</div>'
        str += '</div>'

        $('#form_module').append(str);
    }

</script>


<?php

    echo '<script>';

    $sql = 'SELECT * FROM MAPPING_LIFE_MODULE AS LM
        LEFT JOIN M_MODULE AS M ON LM.MODULE_ID = M.MODULE_ID
        WHERE STUDENT_ID = ' . $_SESSION["USER_ID"];
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $data_arr[] = array(
                "id" => $row["MODULE_ID"],
                "code" => $row["MODULE_CODE"],
                "name" => $row["MODULE_NAME"],
                "date" => $row["CREATE_DATE"]
            );
        }
        echo 'generate_module(' . json_encode($data_arr) . ');';
    }
    
    $sql = 'SELECT * FROM M_MODULE WHERE MODULE_ID NOT IN
        (SELECT MODULE_ID FROM MAPPING_LIFE_MODULE
        WHERE STUDENT_ID = ' . $_SESSION["USER_ID"] . ')
        AND MODULE_ID NOT LIKE 0';
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $data_response[] = array(
                "id" => $row["MODULE_ID"],
                "code" => $row["MODULE_CODE"],
                "name" => $row["MODULE_NAME"],
            );
        }
        echo 'select_module(' . json_encode($data_response) . ')';
    }
    echo '</script>';

?>