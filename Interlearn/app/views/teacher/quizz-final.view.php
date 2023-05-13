<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
<div class="mid-container">
    <div class="quizz_left">
    </div>
    <div class="question_right">
        <h1>Confirmation Path</h1>
        <p>Add the time slots and confirmation details</p>
        <br>
        
        <form name="confirmForm" action="" method="POST" onsubmit="return validateConfirmForm();">
            <label for="question_total">Total Question <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=number name="display_question" value="" placeholder="Total number of questions">
            <span id="total-error" style="color:red"></span>
            
            <br>
            <div class="enable_disable">
                <div class="enable">
                    <label for="time_period">Quizz Date<strong> *</strong> : </label>
                    <input class="quizz_date" type=date name="quizz_date">
                </div>
                <span id="date-error" style="color:red"></span>
                <div class="enable">
                    <label for="time_period">Enable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="enable_time" id="enable-time" value="" placeholder="">
                </div>
                <!-- validate time -->
                <span id="enable-error" style="color:red"></span>
                <div class="enable">
                    <label for="time_period">Disable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="disable_time" id="disable-time" value="" placeholder="">
                </div>
                <span id="disable-error" style="color:red"></span>
            </div>

            <br>
            <label for="time_period">Duration <strong> *</strong> : </label><br>
            <div class="select_duration">
                <!-- <div> -->
                    <input class="time_period" type=number name="duration" value="" placeholder="">
                <!-- </div>   -->
                <!-- <div> -->
                    <select name="format_time" id="format_time">
                            <option value="all_correct"> minutes </option>
                            <option value="three_correct"> hours </option>
                    </select>
                <!-- </div> -->
            </div>
            <span id="duration-error" style="color:red"></span>
            <br>
            <label for="time_period">Total Marks <strong> *</strong> : </label><br>
            <input class="time_period" type=number name="total_points" value="" placeholder="">
            <span id="points-error" style="color:red"></span>
            <br><br>
            <input  class = "home_sbtd" type="submit" value="Confirm">
        </form>
           
    </div>
</div>
        </div></div></div>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>