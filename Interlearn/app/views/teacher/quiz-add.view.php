<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>

    <div class="question_right">
            
        <h1>Create Question</h1>
        <p>Here, you can add the questions to the question bank </p>
        <br>
        
        <form action="" method="POST">
            <label for="question_name">Question Name <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=text name="question_title" value="" placeholder="Eg : When UCSC is established ?">

            <div class="choices">
                <ul>
                    <li>
                        <label for="choice_#1">Choice #1 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="choice1" value="" placeholder="Eg : In, 1898 ">
                            </div>
                            <div>
                                <select name="choice1_mark" id="marks">
                                    <option value="0"> 0% </option>
                                    <option value="25"> 25% </option>
                                    <option value="33"> 33.3% </option>
                                    <option value="50"> 50% </option>
                                    <option value="100"> 100% </option>
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
                            <div>
    
                                <select name="choice2_mark" id="marks">
                                    <option value="0"> 0% </option>
                                    <option value="25"> 25% </option>
                                    <option value="33"> 33.3% </option>
                                    <option value="50"> 50% </option>
                                    <option value="100"> 100% </option>
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
                            <div>
                                <select name="choice3_mark" id="marks">
                                    <option value="0"> 0% </option>
                                    <option value="25"> 25% </option>
                                    <option value="33"> 33.3% </option>
                                    <option value="50"> 50% </option>
                                    <option value="100"> 100% </option>
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
                            <div>
                                <select name="choice4_mark" id="marks">
                                    <option value="0"> 0% </option>
                                    <option value="25"> 25% </option>
                                    <option value="33"> 33.3% </option>
                                    <option value="50"> 50% </option>
                                    <option value="100"> 100% </option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <label for="question_mark">Question Marks <strong> *</strong> : </label>
            <input class="choice_inp" type=number name="question_mark" value="" placeholder="10 ">
            <!-- <br> -->
            <input  class = "home_sbtd" type="submit" value="Add question">
            <br><br>
            <!-- <div class="buttons">
                <div>
                    <input  class = "home_sbt" type="submit" value="Cancel">
                </div>
                <div>
                    <input  class = "home_sbt" type="submit" value="Save & Continue  > ">
                </div>
                
            </div> -->
        </form>   
    </div>
</div>

<?php $this -> view('includes/footer'); ?>