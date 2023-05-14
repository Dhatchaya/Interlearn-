<div class="main-body-div">

    <?php $this->view("includes/sidebar_ins"); ?>

    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content-add"></div>
<div class="mid-container">
    <div class="quizz_left">

    </div>

    <div class="question_right3">
            
        <h1>Create Question</h1>
        <p>Here, you can add the questions to the question bank </p>
        <br>
        
        <form name="myForm" action="" method="POST" onsubmit="return validateForm();">

            <span id="sum-error" class="sum-error" style="color:red; margin-left:35%"></span><br>
            <label for="question_name" style="font-size:16px; font-weight:500;">Question <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=text name="question_title" value="" placeholder="Eg : When UCSC is established ?" id="quiz_name">
            <span id="question-error" class="question-error" style="color:red"></span><br>

            <label for="category">Quiz bank No.<strong> *</strong> : </label><br>
            <input class="home_cnt_inp" type=number name="quiz_bank" value="" placeholder="Eg : 1">
            <!-- <select name="category" id="marks">
                <option value="low"> Low </option>
                <option value="Medium"> Medium </option>
                <option value="Hard"> Hard </option>
            </select> -->
            <div class="choices">
                
                <h3>Choices</h3><br>
                <ul>
                    <li>
                        <label for="choice_#1">Choice #1 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="choice1" value="" placeholder="Eg : In, 1898 ">
                                
                            </div>
                            <span id="choice1-error" style="color:red"></span>
                            <div>
                                <select name="choice1_mark" id="marks">
                                    <option value="-1.00"> -100% </option>
                                    <option value="-0.75"> -75% </option>
                                    <option value="-0.50"> -50% </option>
                                    <option value="-0.25"> -25% </option>
                                    <option value="0"> 0% </option>
                                    <option value="0.25"> 25% </option>
                                    <option value="0.33"> 33.3% </option>
                                    <option value="0.50"> 50% </option>
                                    <option value="1.00"> 100% </option>
                                </select>
                                <!-- <input class="choice_inp" type=number name="text" value="" placeholder="Eg : In, 1898 "> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="choice_#2">Choice #2 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="choice2" value="" placeholder="Eg : In, 2000 ">
                                
                            </div>
                            <span id="choice2-error" style="color:red"></span>
                            <div>
    
                                <select name="choice2_mark" id="marks">
                                    <option value="-1.00"> -100% </option>
                                    <option value="-0.75"> -75% </option>
                                    <option value="-0.50"> -50% </option>
                                    <option value="-0.25"> -25% </option>
                                    <option value="0"> 0% </option>
                                    <option value="0.25"> 25% </option>
                                    <option value="0.33"> 33.3% </option>
                                    <option value="0.50"> 50% </option>
                                    <option value="1.00"> 100% </option>
                                </select>
                            </div>
                        </div> 
                    </li>
                    <li>
                        <label for="choice_#3">Choice #3 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="choice3" value="" placeholder="Eg : In, 1899 ">
                                
                            </div>
                            <span id="choice3-error" style="color:red"></span>
                            <div>
                                <select name="choice3_mark" id="marks">
                                    <option value="-1.00"> -100% </option>
                                    <option value="-0.75"> -75% </option>
                                    <option value="-0.50"> -50% </option>
                                    <option value="-0.25"> -25% </option>
                                    <option value="0"> 0% </option>
                                    <option value="0.25"> 25% </option>
                                    <option value="0.33"> 33.3% </option>
                                    <option value="0.50"> 50% </option>
                                    <option value="1.00"> 100% </option>
                                </select>
                            
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="choice_#4">Choice #4 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="choice4" value="" placeholder="Eg : In, 2002 ">
                                
                            </div>
                            <span id="choice4-error" style="color:red"></span>
                            <div>
                                <select name="choice4_mark" id="marks">
                                    <option value="-1.00"> -100% </option>
                                    <option value="-0.75"> -75% </option>
                                    <option value="-0.50"> -50% </option>
                                    <option value="-0.25"> -25% </option>
                                    <option value="0"> 0% </option>
                                    <option value="0.25"> 25% </option>
                                    <option value="0.33"> 33.3% </option>
                                    <option value="0.50"> 50% </option>
                                    <option value="1.00"> 100% </option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <label for="question_mark">Question Marks <strong> *</strong> : </label>
            <input class="choice_inp" type=number name="question_mark" value="" placeholder="10 ">
            <span id="marks-error" style="color:red"></span>
            <!-- <br> -->
            <!-- <input  class = "home_sbtd" type="button" value="Confirm">  -->

            <div class="confirm_submit_button">
                <div class="confirm_button">
                    <input  class = "home_sbtd" type="submit" value="Save">
                </div>
            </div>
             
        </form>   
    </div>
</div>
</div>
</div>
</div>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>