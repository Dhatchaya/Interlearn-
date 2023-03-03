<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_assignment_container">
    <?php $this->view("includes/sidebar_teach");?>
    <div class="subm_details">
        <h1> <span> <?=$assignment ?> </span> </h1>
        <div class = "assign_body"> 
            <h4>Number of submissions: <?=$count->count ?> </h4> 
           
           
            <?php if(!empty($error)):?>
            <p id="error" class="warning"><?=$error?></p>
            <?php endif;?>
            <form method ="POST">
                <table border= 1 class='enq_tbl'>
                    
                        <tr>
                            <th>*</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>File Name</th>
                            <th>Date of Submission</th>
                        
                        </tr>
            
                        <?php if(!empty($submissions)):?>
                        
                        <?php foreach($submissions as $row):?>

                        <tr>
                            <td><input type = "checkbox" name = "files[]" id="files" value="<?=$row->submissionId?>"/></td>
                            <td><?=esc($row->studentID)?></td>
                            <td><?=esc($row->Name)?></td>
                            <td>
                        
                                <?php foreach($row->Files as $file):?>
                                    <p class="files_display"><?=esc($file)?></p>
                                <?php endforeach;?>
                
                            </td>
                            <td><?=esc($row->modified)?></td>
                    
                        </tr>
                        <?php endforeach;?>
                            <td colspan="5">
                                <div class="check_files">
                               <span class="dddd"> <input type = "checkbox" name = "allfiles" id="files_checkall"/> Check All </span>
                                <input class="reply-btn" type="submit" value="Download as zip" name = "reply_submit"/>
                                <input class="reply-btn" type="reset" value="Reset" />
                                </div>
                            </td>
                        <?php else:?>
                        <tr><td colspan="5">No records found!</td></tr>
                        <?php endif;?>
                </table>
            </form>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/downloadsubmission.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>