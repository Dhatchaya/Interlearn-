<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar'); ?>
    </div>
    <div class="question_right">
        <h1>Confirmation Path</h1>
        <p>Add the time slots and confirmation details</p>
        <br>
        
        <form action="" method="POST">
            <label for="question_total">Total Question <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=number name="number" value="" placeholder="Total number of questions">

            <label for="time_period">Start Time <strong> *</strong> : </label><br>
            <input class="minute_inp" type=time name="number" value="" placeholder="">
            <br><br>
            <label for="time_period">End Time <strong> *</strong> : </label><br>
            <input class="minute_inp" type=time name="number" value="" placeholder="">
        </form>
           
    </div>
</div>

<?php $this -> view('includes/footer'); ?>