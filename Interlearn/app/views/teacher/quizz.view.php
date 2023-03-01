<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="quizz_right">
        <div class="quiz-head">
            <h2>Add Information About Quizz</h2>
            <p>Give your quizz a name and description. so, 
            it gives clearification to the student</p>
        </div>
        <form action="" method="post">
            <div class="quiz-name">
                <h3>Quiz name <strong>*</strong></h3>
                
                <input class="home_cnt_inp" type=text name="quizz_name" value="" placeholder="Eg : sample quiz">
            </div>

            <div class="quiz-description">
                <h3>Quiz Description <strong>*</strong></h3>
                <textarea class="home_cnt_inp" id="message" name="quizz_description" placeholder="Insert a quiz description" style="height:50px"></textarea>
            </div>

            <!-- <div class="quiz-total">
                <h3>Total Number of questions in quizz bank <strong>*</strong></h3>
                
                <input class="home_cnt_inp" type=number name="quizz_bank" value="" placeholder="Eg : 25">
            </div> -->
            <hr>
            <div class="quiz-next-options">
                
            
                <input  class = "home_form_sbt" type="submit" value="Save & Continue">
                
            </div>
            
        </form>
    </div>
</div>

<?php $this -> view('includes/footer'); ?>