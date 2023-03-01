<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="question_right">
        <h1>Confirmation Path</h1>
        <p>Add the time slots and confirmation details</p>
        <br>
        
        <form action="" method="POST">
            <label for="question_total">Total Question <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=number name="display_question" value="" placeholder="Total number of questions">

            
            <br>
            <div class="enable_disable">
                <div class="enable">
                    <label for="time_period">Quizz Date<strong> *</strong> : </label>
                    <input class="quizz_date" type=date name="quizz_date">
                </div>
                <div class="enable">
                    <label for="time_period">Enable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="enable_time" value="" placeholder="">
                </div>
                <div class="enable">
                    <label for="time_period">Disable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="disable_time" value="" placeholder="">
                </div>
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
            <br>
            <label for="time_period">Total Marks <strong> *</strong> : </label><br>
            <input class="time_period" type=number name="total_points" value="" placeholder="">

            <br><br>
            <input  class = "home_sbtd" type="submit" value="Confirm">
        </form>
           
    </div>
</div>

<?php $this -> view('includes/footer'); ?>