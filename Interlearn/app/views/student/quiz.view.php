<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles1.css">
</head>
<body>
    <div class="home-box custom-box">
        <h3>Instruction : </h3>
        <p>Total number of questions : <span class="total-question"></span></p>
        <button type="button" class="btn" onclick="StartQuiz()">Start Quiz</button>
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
        <button type="button" class="btn" onclick="tryAgainQuiz()">Try Again</button>
        <button type="button" class="btn" onclick="goToHome()">Goto Home</button>
    </div>

    <!-- <script defer src="quiz.js?v=<?php //echo time(); ?>"></script>
    <script defer src="app.js?v=<?php //echo time(); ?>"></script> -->
    <script src="<?=ROOT?>/assets/js/dquiz.js"></script>
    <script src="<?=ROOT?>/assets/js/doquiz.js"></script>
</body>