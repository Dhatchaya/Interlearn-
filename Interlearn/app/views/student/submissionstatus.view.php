<?php $this->view("includes/header");?>




<div class="main-body-div">
<?php $this->view("includes/sidebar");?>

<div class="std_sub_grd_container top-to-bottom-content">
<?php $this->view("includes/nav");?>


        <div class="std_sub_grd_content">
            <h2><?=esc($assignment->subject)?> - <?=esc($assignment->grade)?></h2><br>
            <p style="font-size: large;"><?=esc($assignment->title)?></p><br>

            <p> <?=esc($assignment->description)?> </p><br>
            <a href="../../../../uploads/<?=esc($assignment->courseId)?>/assignments/<?=esc($assignment->assignmentId)?>/<?=esc($assignment->filename)?>"  class= "attachment-link">View Attachment</a>
            <br><br>
            <div class="std_subm_container2">
                <div class="std_sub_grd_row1">
                    <p class="std_sub_grd_col1">assignment Status</p>
                    <?php if ($assignment->deadline<$assignment->modified):?>
                        <p class="warning">Late Submission</p>
                    <?php else:?>
                    <p><?=esc($assignment->status)?></p>
                    <?php endif;?>
                </div>
                <!-- <div class="std_sub_grd_row2">
                    <p class="std_sub_grd_col1">Grading Status</p>
                    <p>Not Graded</p>
                </div> -->
                <div class="std_sub_grd_row2">
                    <p class="std_sub_grd_col1">Due Date</p>
                    <p><?=esc($assignment->deadline)?></p>
                </div>
             
                <div class="std_sub_grd_row1">
                <p class="std_sub_grd_col1">Time Remaining</p>
                    <?php if($assignment->overdue):?>
                        <p class="std_sub_grd_col1 warning">Assignment overdue by </p>
                        <p class="warning"><?=esc($assignment->remaining)?></p>
                    <?php else:?>
                    <p><?=esc($assignment->remaining)?></p>
                    <?php endif;?>
                </div>
                <div class="std_sub_grd_row2">
                    <p class="std_sub_grd_col1">Last Modified</p>
                    <p><?=esc($assignment->modified)?></p>
                </div>
                <br><br>
                <?php if(strtotime($assignment->acceptDate) < strtotime(date("Y/m/d h:i:sa"))):?>
                <div class="std_sub_grd_bottom">
                    <?php if($assignment->status == "Submitted"):?>
                        <a href="<?=ROOT?>/student/coursepg/submission/<?=esc($assignment->courseId)?>/view?sub_id=<?=esc($assignment->submissionID)?>">
                             <button type="submit" class="std_sub_grd_btn">Edit Submission</button><br><br>
                        </a>
                 
                    <?php else:?>
                        <a href="<?=ROOT?>/student/coursepg/submission/<?=esc($assignment->courseId)?>/view?id=<?=esc($assignment->assignmentId)?>">
                        <button type="submit" class="std_sub_grd_btn">Add Submission</button><br><br>
                        </a>
                        <p>You have not made a submission yet.</p>
                    <?php endif;?>
                </div>
                <?php else:?>
                    <p style="text-align:center">Acceptes submissions from <?=esc($assignment->acceptDate)?> </p>
                <?php endif;?>

            </div>
            </div>
        </div>
    </div>

    <!-- <?php $this->view("includes/footer");?> -->