<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="question_right">
        <h1>Create Question</h1>
        <p>Here, you can add the questions to the question bank</p>
        <br>
        
        <form action="<?=ROOT?>/teacher/quizz/final">
            <label for="question_name">Question Name <strong> *</strong> : </label>
            <input class="home_cnt_inp" type=text name="text" value="" placeholder="Eg : When UCSC is established ?">

            <div class="choices">
                <ul>
                    <li>
                        <label for="question_name">Choice #1 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="text" value="" placeholder="Eg : In, 1898 ">
                            </div>
                            <div>
                                <select name="marks" id="marks">
                                    <option value="all_correct"> 25% </option>
                                    <option value="three_correct"> 33.3% </option>
                                    <option value="fifty_fifty"> 50% </option>
                                    <option value="full_marks"> 100% </option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="question_name">Choice #2 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="text" value="" placeholder="Eg : In, 2000 ">
                            </div>
                            <div>
                                <select name="marks" id="marks">
                                    <option value="all_correct"> 25% </option>
                                    <option value="three_correct"> 33.3% </option>
                                    <option value="fifty_fifty"> 50% </option>
                                    <option value="full_marks"> 100% </option>
                                </select>
                            </div>
                        </div> 
                    </li>
                    <li>
                        <label for="question_name">Choice #3 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="text" value="" placeholder="Eg : In, 1899 ">
                            </div>
                            <div>
                                <select name="marks" id="marks">
                                    <option value="all_correct"> 25% </option>
                                    <option value="three_correct"> 33.3% </option>
                                    <option value="fifty_fifty"> 50% </option>
                                    <option value="full_marks"> 100% </option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="question_name">Choice #4 <strong> *</strong> : </label>
                        <div class="choices_percentage">
                            <div>
                                <input class="choice_inp" type=text name="text" value="" placeholder="Eg : In, 2002 ">
                            </div>
                            <div>
                                <select name="marks" id="marks">
                                    <option value="all_correct"> 25% </option>
                                    <option value="three_correct"> 33.3% </option>
                                    <option value="fifty_fifty"> 50% </option>
                                    <option value="full_marks"> 100% </option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- <br> -->
            <input  class = "home_sbtd" type="submit" value="Add question">
            <br><br>
            <div class="buttons">
                <div>
                    <input  class = "home_sbt" type="submit" value="Cancel">
                </div>
                <div>
                    <input  class = "home_sbt" type="submit" value="Save & Continue  > ">
                </div>
                
            </div>
        </form>   
    </div>
</div>

<?php $this -> view('includes/footer'); ?> ?>