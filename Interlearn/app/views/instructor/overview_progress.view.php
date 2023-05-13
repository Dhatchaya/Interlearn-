<?php $this->view("includes/header"); ?>
<div class="main-body-div">

    <?php $this->view("includes/sidebar_ins"); ?>

    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content"></div>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles4.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles6.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        .edit_delete {
            display: flex;
            flex-direction: row;
            justify-content: center;
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

    </div>
    <!-- <div class="quizz_right"> -->
        <!-- <a href=""><button>Add Question</button></a> -->
        <!-- <div class="report_table"></div> -->
        <div class="clm3">
            <!-- <div class="std_crs_ov_progress"> -->
            <div class="inner">
                <div>
                    <h3>Overview Result</h3>
                </div>
                <div>
                    <!-- <h2 class="add_heading_init">Overview Result</h2> -->
                    <!-- <div class="progress-report"></div> -->
                    <canvas id="myChart" style="width:100%;max-width:500px"></canvas><br>
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
                                text: "Statistics"
                                }
                            }
                            });
                        </script>
                </div>
            </div>
        </div>
        <div class="header_fixed">
            <table class="progress_tbl">
                <thread>
                    <tr>
                        <th>ID</th>
                        <th>Student Number</th>
                        <th>Marks</th>
                        <th>Actions</th>
                    </tr>
                </thread>
                <tbody>
                    <?php if(!empty($rows2)):?>
                
                    <?php foreach($rows2 as $row):?>
                        
                    <tr>
                        <td><?=esc($row->id)?></td>
                        <td><?=esc($row->studentID)?></td>
                        <td><?=esc($row->marks)?></td>
                        <td>
                            <div class="edit_delete">
                                <div class="edit" onclick=editQuestion(<?=esc($row->id)?>)>
                                    <button onclick="toModal(<?=esc($row->marks)?>)">edit</button>
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
        <div class="bg_modal" id="modal">
            <div class="box_modal2">
                <h3> -- Update Marks -- </h3>
                <form action="" method="POST">
                    <input type="hidden" value="<?=esc($row->id)?>" name="id" id="id">
                    <input type="number" id="input_marks" name="mymarks" class="time_period" placeholder="update marks">

                    <input type="submit" value="Update" class = "home_form_sbt" name="edit_marks">
                </form>
            </div>
        </div>
        <!-- <p>Hello I'm all</p> -->
    </div>
</div>
</div>
</div>
</div>
<script defer src="<?=ROOT?>/assets/js/progress_popup.js?v=<?php echo time(); ?>"></script>
<!-- <script defer src="<?=ROOT?>/assets/js/progress.js?v=<?php echo time(); ?>"></script> -->
<?php $this -> view('includes/footer'); ?>