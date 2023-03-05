<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles2.css">
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>

    
    <div class="clm2">
        <h2 class="add_heading_init">Quizz Bank</h2>
        <a href="<?=ROOT?>/teacher/course/quiz/4/79/new"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add New Question</button></a>

        <a href="<?=ROOT?>/teacher/course/quiz/4/79/create"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add a Quiz</button></a>
                <!-- add form -->
        <div class="modal1" id="modal1" >
        
    </div>

        <!-- <a href=""><button>Add Question</button></a> -->
        <div class="header_fixed">
            <table >
                <thread>
                    <tr>
                        <th >Question ID</th>
                        <th>Question</th>
                        <th>Choice#1</th>
                        <th>Choice#1 Mark</th>
                        <th>Choice#2</th>
                        <th>Choice#2 Mark</th>
                        <th>Choice#3</th>
                        <th>Choice#3 Mark</th>
                        <th>Choice#4</th>
                        <th>Choice#4 Mark</th>
                        <th>Category</th>
                        <th>Question Mark</th>
                        <th class="action_clm">Actions</th>
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
                        <td><?=esc($row->category)?></td>
                        <td><?=esc($row->question_mark)?></td>
                        <td>
                            <div class="edit_delete">
                                <div class="edit" onclick=editQuestion(<?=esc($row->question_number)?>)>
                                    <button>edit</button>
                                </div>
                                <div class="delete">
                                    <a href="<?=ROOT?>/teacher/course/quiz/4/79/delete?qnum=<?=esc($row->question_number)?>"><button>delete</button></a>
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
        <!-- <p>Hello I'm all</p> -->
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/zquiz.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>