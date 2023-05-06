<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<head>
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles2.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        .edit_delete {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .edit, .delete {
            padding-left: 5px;
            padding-right: 5px;
        }
        td button {
            border: none;
            padding: 7px 8px;
            border-radius: 20px;
            background-color: black;
            color: #e6e7e8;
        }
    </style>
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <!-- <div class="quizz_right"> -->
        <!-- <a href=""><button>Add Question</button></a> -->
        <!-- <div class="report_table"></div> -->
        <div class="clm2">
            <h2 class="add_heading_init">Overview Result</h2>
            <!-- <div class="progress-report"></div> -->
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas><br>
                    <!-- add form -->
            <div class="modal1" id="modal1">
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
                        text: "Mathematics"
                        }
                    }
                    });
                </script>
        </div>
        <div class="header_fixed">
            <table >
                <thread>
                    <tr class="std_crs_ov_tablep">
                        <th class="std_crs_ov_heading">ID</th>
                        <th class="std_crs_ov_heading">Student Number</th>
                        <th class="std_crs_ov_heading">Marks</th>
                        <th class="std_crs_ov_heading">Actions</th>
                    </tr>
                </thread>
                <tbody>
                    <?php if(!empty($rows2)):?>
                
                    <?php foreach($rows2 as $row):?>
                        
                    <tr class="std_crs_ov_trow">
                        <td class="std_crs_ov_col1"><?=esc($row->id)?></td>
                        <td class="std_crs_ov_col1"><?=esc($row->studentID)?></td>
                        <td class="std_crs_ov_col1"><?=esc($row->marks)?></td>
                        <td class="std_crs_ov_col1">
                            <div class="edit_delete">
                                <div class="edit" onclick=editQuestion(<?=esc($row->id)?>)>
                                    <button>edit</button>
                                </div>
                                <div class="delete">
                                    <a href="<?=ROOT?>/instructor/course/progress/<?=esc($course_id)?>/1/delete?qnum=<?=esc($row->id)?>"><button>delete</button></a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr><td colspan="15">No records found!</td></tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
        <!-- <p>Hello I'm all</p> -->
    </div>
</div>

<!-- <script defer src="<?=ROOT?>/assets/js/progress.js?v=<?php echo time(); ?>"></script> -->
<?php $this -> view('includes/footer'); ?>