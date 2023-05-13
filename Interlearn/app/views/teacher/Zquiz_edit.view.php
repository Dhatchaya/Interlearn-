<?php $this->view("includes/header"); ?>
<div class="main-body-div">

    <?php $this->view("includes/sidebar_ins"); ?>

    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content"></div>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles5.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles3.css">
</head>
<div class="mid-container">
    <div class="quizz_left">

    </div>
    <!-- <h1>hello</h1> -->
    <div class="question_right2">
        <h1>Quiz Details</h1>
        <p>Here, you can edit the quiz </p>
        <br>
        <div class="mytable">
            <table class="quiz_tbl">
                <thread>
                    <?php if(!empty($rows)):?>

                    <?php foreach($rows as $row):?>
                    <tr>
                        <th >Quiz ID</th>
                        <td><?=esc($row->quiz_id)?></td>
                    </tr>
                    <tr>
                        <th >Quiz Description</th>
                        <td><?=esc($row->quiz_description)?></td>
                    </tr>
                    <tr>
                        <th >Total Points</th>
                        <td><?=esc($row->total_points)?></td>
                    </tr>
                    <!-- <tr>
                        <th >Quiz Date</th>
                        <td><?=esc($row->quiz_date)?></td>
                    </tr> -->
                    <tr>
                        <th >Enable Time</th>
                        <td><?=esc($row->enable_time)?></td>
                    </tr>
                    <tr>
                        <th >Disable Time</th>
                        <td><?=esc($row->disable_time)?></td>
                    </tr>
                    <tr>
                        <th >Duration</th>
                        <td><?=esc($row->duration)?></td>
                    </tr>
                    <tr>
                        <th >Format Time</th>
                        <td><?=esc($row->format_time)?></td>
                    </tr>
                </thread>
                <tbody>


                </tbody>
            </table>
        </div>

        <div class="bg_modal" id="modal">
            <div class="box_modal">
                <h3> -- Update Quiz -- </h3><br>
                <form name="confirmEditForm" action="" method="POST" id="My-form">
                    <!-- <input type="hidden" value="" name="id" id="id"> -->
                    
                    <label for="question_total">Quiz Description <strong> *</strong> : </label>
                    <textarea class="home_cnt_inp" name="quiz_description" id="input_description" placeholder="Insert a quiz description" style="height:50px"></textarea>
                    
                    <div class="enable_disable">
                        <div class="enable">
                            <label for="question_total">Quiz Name <strong> *</strong> : </label>
                            <input class="time_period" type=text name="quiz_name" value="" id="input_name" placeholder="Quiz name">
                        </div>
                        <!-- <span id="total-error" style="color:red"></span> -->
                        <div class="enable">
                            <label for="time_period">Total Marks <strong> *</strong> : </label>
                            <input class="time_period" type=number name="total_points" value="" id="input_total" placeholder="">
                        </div>
                    </div>

                    <div class="enable_disable">
                        <!-- <div class="enable">
                            <label for="time_period">Quizz Date<strong> *</strong> : </label>
                            <input class="quizz_date" type=date name="quiz_date">
                        </div>
                        <span id="date-error" style="color:red"></span> -->
                        <div class="enable">
                            <label for="time_period">Enable time <strong> *</strong> : </label>
                            <input class="time_period" type=datetime-local name="enable_time" id="enable_time" value="" placeholder="">
                        </div>
                        <!-- validate time -->
                        <div class="enable">
                            <label for="time_period">Disable time <strong> *</strong> : </label>
                            <input class="time_period" type=datetime-local name="disable_time" id="disable_time" value="" placeholder="">
                        </div>
                        
                    </div>
                    <span id="enable-disable-error" style="color:red"></span><br>
                    <label for="time_period">Duration <strong> *</strong> : </label><br>
                    <div class="select_duration">
                        <!-- <div> -->
                            <input class="time_period" type=number name="duration" value="" id="input_duration" placeholder="">
                        <!-- </div>   -->
                        <!-- <div> -->
                            <select name="format_time" id="format_time">
                                    <option value="minutes"> minutes </option>
                                    <!-- <option value="hours"> hours </option> -->
                            </select>
                        <!-- </div> -->
                    </div>

                    <!-- <input type="number" id="input_marks" name="mymarks" class="time_period" placeholder="update marks"> -->

                    <input type="submit" value="Update" class = "home_form_sbt" name="edit_quiz">
                </form>
            </div>
        </div>
        
        <button class="home_myform_sbt" onclick="toModal(<?=esc($row->duration)?>, <?=esc($row->total_points)?>, '<?=esc($row->quiz_description)?>', '<?=esc($row->quiz_name)?>', '<?=esc($row->enable_time)?>', '<?=esc($row->disable_time)?>')">Update Quiz</button>
        <?php endforeach;?>
        <?php else:?>
        <tr><td colspan="15">No records found!</td></tr>
        <?php endif;?>

        
    </div>
    

</div>
</div>
</div>
</div>
<script defer src="<?=ROOT?>/assets/js/quizEdit.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>