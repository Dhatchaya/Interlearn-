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
        
        <a href="<?=ROOT?>/teacher/quiz/new"><button type="button" data-modal-target= "#modal" class="Add_enq" >+ Add New Question</button></a>
                <!-- add form -->
        <div class="modal1" id="modal1" >
        
        <!-- <form method= "POST" class= "enq_form"  >
            <div class = "form-header">
            <h2 class="enq_heading" id="enq_heading"></h2>
            <button type="button" onclick=closeEnquiry();  data-close-button class ="close-btn">&times;</button>
            </div>
        
            <lable for= "category">Category</lable></br>
            <select name = "type" class="enq_cat whiteInput">
                <option value = "" selected>--</option>
                <option value = "personal">Personal</option>
                <option value = "suggestion">General Suggestion</option>
                
            </select></br>
            <lable for= "title">Title</lable></br>
            <input type = "text" name ="title" class="enq_title whiteInput"/></br>
            <lable for= "Subject">Description</lable></br>
            <textarea class="whiteInput" id="sub" name="content" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
            <input type = "submit" id ="sub_btn" class ="sub_btn" name="submit" value="Submit" />

        </form> -->
    </div>


        <!-- <a href=""><button>Add Question</button></a> -->
        <table border = 1 >
            <tr>
                <th >Question ID</th>
                <th>Question</th>
                <th>Choice - 1</th>
                <th>Choice - 1 Mark</th>
                <th>Choice - 2</th>
                <th>Choice - 2 Mark</th>
                <th>Choice - 3</th>
                <th>Choice - 3 Mark</th>
                <th>Choice - 4</th>
                <th>Choice - 4 Mark</th>
                <th class="action_clm">Actions</th>
            </tr>

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
                    <div class="enq_actions">
                        <div class="enq_edit"  <?php if($row->status == 'pending'):?> onclick=editEnquiry(<?=esc($row->eid)?>) <?php else:?> style="display:none" <?php endif;?>>
                            <button class="edit_enq_btn">Edit</button>
                        </div>
                        <div class="enq_delete">
                            <a href="<?=ROOT?>/academic/enquiry/delete/<?=esc($row->eid)?>">
                            <button class="delete_enq_btn">Delete</button>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
            <tr><td colspan="15">No records found!</td></tr>
            <?php endif;?>
        </table>
        <!-- <p>Hello I'm all</p> -->
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/enquiry.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>