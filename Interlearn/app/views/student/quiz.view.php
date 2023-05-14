<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>

<head>
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles1.css">
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="do_quiz_right">
        <div class="home-box custom-box">
            <?php if (!empty($row)) : ?>
            <?php foreach($row as $rows):?>

            <h3>Instruction : </h3><br>
            <div><span class="tab"><?php echo($rows->quiz_description) ?></span></div><br>
            <!-- <span class="description"></span> -->
            <p>Total number of questions : <?php echo($rows->display_question) ?>
            <!-- <span class="total-question"></span> -->
            </p>
            <?php if (!empty($results)) : ?>
            <?php foreach($results as $res):?>
                <?php if ($res->count == 0) : ?>
                    <?php if((strtotime($rows->enable_time) < strtotime(date("Y/m/d h:i:sa"))) && (strtotime($rows->disable_time) > strtotime(date("Y/m/d h:i:sa")))):?>
                        <p style="color:green">This quiz opens at : <?php echo($rows->enable_time) ?></p>
                        <p style="color:green">This quiz ends at : <?php echo($rows->disable_time) ?></p>
                        <button type="button" class="btn" onclick="StartQuiz()">Start Quiz</button>
                    <?php else: ?>
                        <p style="color:red">This quiz opens at : <?php echo($rows->enable_time) ?></p>
                        <p style="color:red">This quiz ends at : <?php echo($rows->disable_time) ?></p>
                        <button type="button" class="btn2" onclick="">Start Quiz</button>
                    <?php endif; ?>
                <?php else : ?>
                    <p style="color:red">You have attempt the quiz before</p>
                    <button type="button" class="btn2" onclick="">Start Quiz</button>
                <?php endif; ?>
            <?php endforeach;?>
            <?php endif; ?>
        </div>

        <div class="quiz-box custom-box hide">
            <div class="question-number">
                
            </div>
            <div class="question-text">
                
            </div>
            <div class="option-container">
                <!-- <div class="option"></div>
                <div class="option"></div>
                <div class="option"></div>
                <div class="option"></div> -->
            </div>
            <div class="next-question-btn">
                <button type="button" class="btn" onclick="next()">Next</button>
            </div>
            
            <div class="answer-indicator">
                <!-- <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div> -->
            </div>
            <div class="remain-time">
                <div><span>Remaining Time :   </span></div>
                <div class="timer" id="timer">
                    
                </div>
            </div>
            
        </div>

        <div class="result-box custom-box hide">
            <h1>Quiz Result</h1>
            <!-- <input type="hidden" name="totalMarks" value="50"> -->
            <table>
                <tr>
                    <td>Total Question</td>
                    <td><span class="total-question"></span></td>
                </tr>
                <!-- <tr>
                    <td>Attempt</td>
                    <td><span class="total-attempt"></span></td>
                </tr>
                <tr>
                    <td>Correct</td>
                    <td><span class="total-correct"></span></td>
                </tr>
                <tr>
                    <td>Wrong</td>
                    <td><span class="total-wrong"></span></td>
                </tr>
                <tr>
                    <td>Percentage</td>
                    <td><span class="total-percentage"></span></td>
                </tr> -->
                <tr>
                    <td>Your Total Score</td>
                    <td><span class="total-score"></span></td>
                </tr>
            </table>
            <!-- <button type="button" class="btn" onclick="tryAgainQuiz()">Try Again</button> -->
            <a href="<?=ROOT?>/student/course/view/<?php echo($rows->course_id) ?>"><button type="button" class="btn" onclick="goToHome()">Goto Home</button></a>
        </div>
            <?php endforeach;?>
            <?php endif; ?>
    </div>
</div>
    

    <!-- <script defer src="quiz.js?v=<?php //echo time(); ?>"></script>
    <script defer src="app.js?v=<?php //echo time(); ?>"></script> -->
    <script defer src="<?=ROOT?>/assets/js/dquiz.js?v=<?php echo time(); ?>"></script>
    <script defer src="<?=ROOT?>/assets/js/doquiz.js?v=<?php echo time(); ?>"></script>
    <?php $this -> view('includes/footer'); ?>
<!-- </body> -->