<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_ins'); ?>
    </div>
    <div class="question_right">
        <h1>Confirmation Path</h1>
        <p>Add the time slots and confirmation details</p>
        <br>
        
        <form action="<?=ROOT?>/teacher/course" method="POST">
            <label for="question_total">Total Question <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=number name="number" value="" placeholder="Total number of questions">

            <label for="time_period">Quizz Date<strong> *</strong> : </label><br>
            <input class="quizz_date" type=date name="date">
            <br>
            <div class="enable_disable">
                <div class="enable">
                    <label for="time_period">Enable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="number" value="" placeholder="">
                </div>
                <div class="enable">
                    <label for="time_period">Disable time <strong> *</strong> : </label>
                    <input class="time_period" type=time name="number" value="" placeholder="">
                </div>
            </div>

            <br>
            <label for="time_period">Duration <strong> *</strong> : </label><br>
            <div class="select_duration">
                <div>
                    <input class="time_period" type=number name="number" value="" placeholder="">
                </div>  
                <div>
                    <select name="format_time" id="format_time">
                            <option value="all_correct"> minutes </option>
                            <option value="three_correct"> hours </option>
                    </select>
                </div>
            </div>
            <br>
            <label for="time_period">Total Marks <strong> *</strong> : </label><br>
            <input class="time_period" type=number name="number" value="" placeholder="">

            <input  class = "home_sbtd" type="submit" value="Confirm">
        </form>
           
    </div>
</div>

<?php $this -> view('includes/footer'); ?>