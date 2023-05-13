<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles2.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles6.css">
</head>
<div class="mid-container2">
    <div class="quizz_left">
    </div>


    <div class="clm2">
        <h2 class="add_heading_init">Quizz Bank</h2>
        <!-- <a href="<?=ROOT?>/teacher/course/quiz/<?=$course->course_id?>" name="question"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add New Question</button></a> -->
        <a href="<?=ROOT?>/teacher/course/quiz/<?php echo($id)?>/1/new"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add New Question</button></a>
        <!-- <div class="class-search-box">
            <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search for Quiz bank..">
        </div> -->
        <!-- <a href="<?=ROOT?>/teacher/course/quiz/4/79/create"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add a Quiz</button></a> -->
                <!-- add form -->
        <div class="modal1" id="modal1" >
        
    </div>

        <!-- <a href=""><button>Add Question</button></a> -->
        <div class="header_fixed">
            <table class="question_tbl">
                <thread>
                    <tr>
                        <th rowspan="2">Question ID</th>
                        <th rowspan="2">Question</th>
                        <th colspan="8">Choices</th>
                        <th rowspan="2">Quizbank</th>
                        <th rowspan="2">Question Mark</th>
                        <th class="action_clm" rowspan="2">Actions</th>
                    </tr>
                        <tr>
                            <th>Choice#1</th>
                            <th>Choice#1 Mark</th>
                            <th>Choice#2</th>
                            <th>Choice#2 Mark</th>
                            <th>Choice#3</th>
                            <th>Choice#3 Mark</th>
                            <th>Choice#4</th>
                            <th>Choice#4 Mark</th>
                        </tr>
                </thread>
                <tbody>
                    <?php if(!empty($rows)):?>
                
                    <?php foreach($rows as $row):?>
                        
                    <tr>
                        <td><?=esc($row->question_number)?></td>
                        <td><?=esc($row->question_title)?></td>
                        <td><?=esc($row->choice1)?></td>
                        <td><?=esc($row->choice1_mark)?></td>
                        <td><?=esc($row->choice2)?></td>
                        <td><?=esc($row->choice2_mark)?></td>
                        <td><?=esc($row->choice3)?></td>
                        <td><?=esc($row->choice3_mark)?></td>
                        <td><?=esc($row->choice4)?></td>
                        <td><?=esc($row->choice4_mark)?></td>
                        <td>
                            <div class="bank_search">
                                <?=esc($row->quiz_bank)?>
                            </div>
                        </td>
                        <td><?=esc($row->question_mark)?></td>
                        <td>
                            <div class="edit_delete">
                                <div class="edit">
                                    <img src="<?= ROOT ?>/assets/images/edit.png" class="teacher_card_img2" alt="" onclick="editQuestion('<?=esc($row->question_title)?>' , <?=esc($row->question_mark)?>, '<?=esc($row->choice1)?>', '<?=esc($row->choice2)?>', '<?=esc($row->choice3)?>', '<?=esc($row->choice4)?>', <?=esc($row->choice1_mark)?>)">
                                    <!-- <button onclick="editQuestion('<?=esc($row->question_title)?>' , <?=esc($row->question_mark)?>, '<?=esc($row->choice1)?>', '<?=esc($row->choice2)?>', '<?=esc($row->choice3)?>', '<?=esc($row->choice4)?>', <?=esc($row->choice1_mark)?>)">edit</button> -->
                                </div>
                                <div class="delete">
                                    
                                    <a href="<?=ROOT?>/teacher/course/quiz/<?php echo($id) ?>/1/delete?qnum=<?=esc($row->question_number)?>">
                                    <img src="<?= ROOT ?>/assets/images/delete.png" alt="" class="teacher_card_img2">
                                </a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr><td colspan="15">No records found!</td></tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>

        <div class="bg_modal" id="modal">
            <div class="box_modal">
                <h3> -- Update Question -- </h3>
                <form action="" name="myForm" method="POST" onsubmit="return validateQuestionPopUp();">
                    <input type="hidden" value="<?=esc($row->question_number)?>" name="id" id="id">

                    <span id="sum-error" class="sum-error" style="color:red; margin-left:35%"></span><br>

                    <label for="question_name" style="font-size:16px; font-weight:500;">Question <strong> *</strong> : </label>
                    <input class="home_cnt_inp" type=text name="question_title" value="" placeholder="Eg : When UCSC is established ?" id="input_question">
                    <span id="question-error" style="color:red"></span>

                    <label for="time_period">Choice 1 <strong> *</strong> : </label><br>
                    <div class="select_duration">
                        <!-- <div> -->
                            <input class="time_period1" type=number name="choice_1" value="" id="input_choice1" placeholder="">
                            <span id="choice1-error" style="color:red"></span>
                        <!-- </div>   -->
                        <!-- <div> -->
                            <select name="format_time1" id="format_time1">
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
                        <!-- </div> -->
                    </div>

                    <label for="time_period">Choice 2 <strong> *</strong> : </label><br>
                    <div class="select_duration">
                        <!-- <div> -->
                            <input class="time_period1" type=number name="choice_2" value="" id="input_choice2" placeholder="">
                            <span id="choice2-error" style="color:red"></span>
                            <!-- </div>   -->
                        <!-- <div> -->
                            <select name="format_time2" id="format_time2">
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
                        <!-- </div> -->
                    </div>

                    <label for="time_period">Choice 3 <strong> *</strong> : </label><br>
                    <div class="select_duration">
                        <!-- <div> -->
                            <input class="time_period1" type=number name="choice_3" value="" id="input_choice3" placeholder="">
                            <span id="choice3-error" style="color:red"></span>
                            <!-- </div>   -->
                        <!-- <div> -->
                            <select name="format_time3" id="format_time3">
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
                        <!-- </div> -->
                    </div>

                    <label for="time_period">Choice 4 <strong> *</strong> : </label><br>
                    <div class="select_duration">
                        <!-- <div> -->
                            <input class="time_period1" type=number name="choice_4" value="" id="input_choice4" placeholder="">
                            <span id="choice4-error" style="color:red"></span>
                            <!-- </div>   -->
                        <!-- <div> -->
                            <select name="format_time4" id="format_time4">
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
                        <!-- </div> -->
                    </div>

                    <label for="question_name" style="font-size:16px; font-weight:500;">Question Marks<strong> *</strong> : </label><br>
                    <input type="number" id="input_marks" name="mymarks" class="time_period" placeholder="Question marks">
                    <span id="marks-error" style="color:red"></span>

                    <input type="submit" value="Update" class = "home_form_sbt" name="edit_question">
                </form>
            </div>
        </div>

        <!-- <p>Hello I'm all</p> -->
    </div>
</div>
        </div></div></div>
<script defer src="<?=ROOT?>/assets/js/zquiz.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/validate_quiz.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/course.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/EditQuestion.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/stdClassSearch.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>