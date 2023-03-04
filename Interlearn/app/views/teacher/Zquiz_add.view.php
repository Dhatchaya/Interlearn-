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
        
        <form name="confirmForm" action="" method="POST" onsubmit="return validateConfirmForm();">

            <label for="quiz_name">Quiz name <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=text name="quiz_name" value="" placeholder="Eg : sample quiz">
        
            <label for="question_total">Quiz Description <strong> *</strong> : </label>
            <textarea class="home_cnt_inp" id="message" name="quiz_description" placeholder="Insert a quiz description" style="height:50px"></textarea>

            <div class="enable_disable">
                <div class="enable">
                    <label for="question_total">Total Question <strong> *</strong> : </label>
                    <input class="time_period" type=number name="display_question" value="" placeholder="Total number of questions">
                </div>
                <span id="total-error" style="color:red"></span>
                <div class="enable">
                    <label for="time_period">Total Marks <strong> *</strong> : </label>
                    <input class="time_period" type=number name="total_points" value="" placeholder="">
                </div>
                <div class="enable">
                    <label for="time_period">Category <strong> *</strong> : </label>
                    <select name="category" id="marks">
                        <option value="low"> Low </option>
                        <option value="Medium"> Medium </option>
                        <option value="Hard"> Hard </option>
                    </select>
                </div>
                <span id="points-error" style="color:red"></span>
            </div>

            <div class="enable_disable">
                <div class="enable">
                    <label for="time_period">Quizz Date<strong> *</strong> : </label>
                    <input class="quizz_date" type=date name="quiz_date">
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
                            <option value="minutes"> minutes </option>
                            <option value="hours"> hours </option>
                    </select>
                <!-- </div> -->
            </div>
            <span id="duration-error" style="color:red"></span>
            <br><br>
            <input  class = "home_sbtd" type="submit" value="Confirm">
        </form>
           
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>