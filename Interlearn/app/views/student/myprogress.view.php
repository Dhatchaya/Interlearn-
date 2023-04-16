<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar'); ?>
    </div>
    <div class="question_right">
        <!-- <h3>Hello progress !</h3> -->
        <div class="std_op_content">
            <h2>Overall Progress</h2>
            <p>Here, you can view the your progress of all the subjects regarding the Subjects.</p>
            <div class="std_op_progress">
            
                <?php if(!empty($rows)):?>
                    <?php foreach($rows as $row):?>
                        <div class="std_op_subject">
                            <!-- <br> -->
                            <h3><?=esc($row->name)?></h3>
                            <!-- <div class="std_op_loader">
                                <p class="std_op_perc">50%</p>
                            </div> -->
                            <a href="<?=ROOT?>/student/myprogress/view?id=<?=esc($row->course_id)?>"><button class="std_op_btn">View Full Report</button></a>
                        </div>
                    <?php endforeach;?>
                        <?php else:?>
                        <h3>No records found!</h3>
                <?php endif;?>

            </div>
        </div>
    </div>
</div>

<?php $this -> view('includes/footer'); ?>