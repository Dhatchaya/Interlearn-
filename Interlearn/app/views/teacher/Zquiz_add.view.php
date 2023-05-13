<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="question_right">
        <h1>Add a Quiz</h1>
        <p>Add the time slots and confirmation details</p>
        <br>
        
        <form name="confirmForm" action="" method="POST" onsubmit="" id="my-form">

            <label for="quiz_name">Quiz name <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=text name="quiz_name" value="<?= set_value('quiz_name')?>" placeholder="Eg : sample quiz">
            <span id="name-error" style="color:red"></span><br>

            <label for="question_total">Quiz Description <strong> *</strong> : </label>
            <textarea class="home_cnt_inp" id="message" name="quiz_description" placeholder="Insert a quiz description" style="height:50px" value="<?= set_value('quiz_description')?>"><?= set_value('quiz_description')?></textarea>
            <br><span id="descriptions-error" style="color:red"></span>

            <div class="enable_disable">
                <div class="enable">
                    <label for="question_total">Total Question <strong> *</strong> : </label>
                    <input class="time_period" type=number name="display_question" value="<?= set_value('display_question')?>" placeholder="Total number of questions">
                    <?php if(!empty($question_error)):?>
                        <span style="color:red"><?=$question_error?></span>
                    <?php endif;?>
                </div>

                <div class="enable">
                    <label for="time_period">Total Marks <strong> *</strong> : </label>
                    <input class="time_period" type=number name="total_points" value="<?= set_value('total_points')?>" placeholder="">
                </div>
                <div class="enable">
                    <label for="quiz_bank">Quiz Bank No. <strong> *</strong> : </label>
                    <select name="quiz_bank" id="quiz_bank">
                        <?php if(!empty($rows)):?>
                        <?php foreach($rows as $row):?>
                        <option value="<?=esc($row->quiz_bank)?>"> <?=esc($row->quiz_bank)?> </option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>

                <!-- <span id="bank-error" style="color:red"></span> -->
            </div>
            <span id="total-error" style="color:red"></span>
            <span id="points-error" style="color:red"></span>
            <div class="enable_disable">
                <!-- <div class="enable">
                    <label for="time_period">Quizz Date<strong> *</strong> : </label>
                    <input class="quizz_date" type=date name="quiz_date">
                </div>
                <span id="date-error" style="color:red"></span> -->
                <div class="enable">
                    <label for="time_period">Enable time <strong> *</strong> : </label>
                    <input class="time_period" type=datetime-local name="enable_time" id="enable_time" value="<?= set_value('enable_time')?>" placeholder="">
                </div>
                <!-- validate time -->
                <div class="enable">
                    <label for="time_period">Disable time <strong> *</strong> : </label>
                    <input class="time_period" type=datetime-local name="disable_time" id="disable_time" value="<?= set_value('disable_time')?>" placeholder="">
                </div>
                
            </div>
            <span id="enable-disable-error" style="color:red"></span>
            <br>
            <label for="time_period">Duration in minutes<strong> *</strong> : </label><br>
            <div class="select_duration">
                <!-- <div> -->
                    <input class="time_period" type=number name="duration" value="<?= set_value('duration')?>" placeholder="">
                <!-- </div>   -->
                <!-- <div> -->
                    <select name="format_time" id="format_time">
                            <option value="minutes"> minutes </option>
                            <!-- <option value="hours"> hours </option> -->
                    </select>
                <!-- </div> -->
            </div>
            <span id="duration-error" style="color:red"></span>
            <br><br>
            <input  class = "home_sbtd" type="submit" value="Confirm" id="Myconfirm">
        </form>
           
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>