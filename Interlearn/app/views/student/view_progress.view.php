<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles6.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<div class="std_crs_ov_container">
<?php $this->view("includes/sidebar");?>
        <div class="std_crs_ov_content">
            <h2>Course Progress</h2>
            <div class="std_crs_ov_top">
                <?php if(!empty($stdetails)):?>
                <?php foreach($stdetails as $row):?>
                <div class="std_crs_ov_name">
                    <h3>Grade   <?=esc($row->grade)?></h3>
                    <h3><?=esc($row->subject)?></h3>
                    <h4>Mr. <?=esc($row->first_name)?></h4>
                </div>
                <?php endforeach;?>
                <?php endif;?>
                <div class="std_crs_ov_progress">
                    <h3 class="std_crs_ov_op">Overall Progress</h3>
                    <!-- <div class="std_crs_ov_loader">
                        <p class="std_crs_ov_perc">60.1%</p>
                    </div> -->
                    <canvas id="myChart" style="width:100%;max-width:500px"></canvas><br>
                        <script>
                            // var x = 'A';
                            // var y = 'B';
                            // var z = 'C';
                            // var p = 'S';
                            // var q = 'W';
                            // var xValues = [x, y, z, p, q];
                            // console.log($newArray);
                            var xValues = <?php echo json_encode(array_keys($newArray)); ?>;
                            console.log(xValues);
                            var yValues = <?php echo json_encode(array_values($newArray)); ?>;
                            var barColors = [
                            "#0D3C4F",
                            "#2D7A8A",
                            "#489BAE",
                            "#7AD0D9",
                            "#DAF6ED"
                            ];

                            new Chart("myChart", {
                            type: "pie",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                title: {
                                display: true,
                                text: "Statistics"
                                }
                            }
                            });
                    </script>
                </div>
            </div>
            <br><br>
            <h2>Progress Report</h2><br>
            <div>
                <table class="progress_tbl">
                    <th>Exam Month</th>
                    <th>Exam Name</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    
                    <?php if(!empty($rows)):?>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <td><?=esc($row->exam_month)?></td>
                                <td><?=esc($row->exam_name)?></td>
                                <td><?=esc($row->marks)?></td>
                                <?php if ($row->marks >= 75): ?>
                                    <td>A</td>
                                <?php elseif ($row->marks >= 65 && $row->marks < 75): ?>
                                    <td>B</td>
                                <?php elseif ($row->marks >= 50 && $row->marks < 65): ?>
                                    <td>C</td>
                                <?php elseif ($row->marks >= 35 && $row->marks < 50): ?>
                                    <td>S</td>
                                <?php else: ?>
                                    <td>W</td>
                                <?php endif; ?>
                            </tr>

                        <?php endforeach;?>
                            <?php else:?>
                            <tr>
                                <td  colaspan="20"><h3>No records found!</h3></td>
                            </tr>
                    <?php endif;?>
                </table>
            </div>
        </div>
        
    </div>
    <?php $this->view("includes/footer");?>