<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="containerSkill" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatableSkill" class="table table">
    <thead>
        <tr>
            <th></th>
            <th>ร้อยละ</th>
        </tr>
    </thead>
    <?php
    $sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านทักษะ' GROUP BY `career`,`side` ORDER BY raw DESC";
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
                        <th><?php echo 'อันดับ '.$i.' '.$row['career']; ?></th> 

                        <?php $Max_scoreS = ($row['raw'] / $sum_rawS)*100; ?>
                        <td><?php echo number_format($Max_scoreS, 2, '.', ' ') ?></td>
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
    Highcharts.chart('containerSkill', {
        data: {
            table: 'datatableSkill'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'อาชีพที่เหมาะกับคุณจากด้านทักษะ'
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
