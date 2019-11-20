<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="containerPsychology" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatablePsychology" class="table table">
    <thead>
        <tr>
            <th></th>
            <th>ร้อยละ</th>
        </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM `sum_form`,data_career WHERE sum_form.career = data_career.career_name AND `user_id`= '$_SESSION_id' AND `date` = '$form_date' AND `type` = '$form_type' AND `side` = '$form_side' ORDER BY `sum_form`.`degree` ASC";
    $result = $conn->query($sql); 
    $i =0 ;
    $sumMax =0 ;
    if ($result->num_rows > 0) 
    { 
        ?>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()) 
            { 
                $i = $i +1;  
                if ($i <= 5) {
                    ?>
                    <tr>
                        <!-- <th><?php //echo $row['degree']; ?></th> -->
                        <th><?php echo 'อันดับ '.$row['degree'].' '.$row['career']; ?></th>
                        <?php $sumMax = $row['raw_score'] + $sumMax ; 
                        $Max_score = ($row['raw_score'] / $row['top_score'] ) *100; ?>
                        <td><?php echo ' '.number_format($Max_score, 2, '.', ' '); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <?php
    }
    ?> 
</table>
<hr>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script type="text/javascript">
    Highcharts.chart('containerPsychology', {
        data: {
            table: 'datatablePsychology'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'อาชีพที่เหมาะกับคุณ'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'ร้อยละ'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
</script>  
