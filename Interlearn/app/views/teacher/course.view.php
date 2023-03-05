<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_crs_container">
<?php $this->view("includes/sidebar_teach");?>
<div class="teacher_crs_main">
    <div class="teacher_crs_content">
        <img src="<?=ROOT?>/assets/images/tchrview.png" class="teacher_crs_topimg">
        <div class="teacher_crs_tophead">
        <?php if(!empty($courses)):?>
            <?php foreach($courses as $course):?>
            <h2 class="teacher_crs_subject">Grade <?=esc($course->grade)?> - <?=esc($course->subject)?></h2>
            <?php endforeach;?>
            <?php endif;?>
            <div class="teacher_crs_dropdown">
                <img src="<?=ROOT?>/assets/images/settings.png" class="teacher_crs_imgset">
                <div class="teacher_crs_dropdown-content">
                  <a href="<?=ROOT?>/teacher/progress">View Progress</a>
                  <a href="<?=ROOT?>/teacher/quizz">Add Quiz</a>
                  <a href="<?=ROOT?>/teacher/course/assignment/4/view">Add Submission</a>
                  <a href="<?=ROOT?>/teacher/upload">Add Materials/Recording</a>
                  <a href="#">Add References</a>
                </div>
            </div>
        </div>
    </div>
        <div class="teacher_crs_content2">
            <a href="#"><img src="<?=ROOT?>/assets/images/forum.png" class="teacher_crs_img">Forum</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/fdb.png" class="teacher_crs_img">Feedback Form</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><br><hr><br>

            <h4>Day 1</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img"></img>Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 1</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2020</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 1</a>
            <a href="#edit"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"></a> 
            <a href="http://localhost/Interlearn/public/teacher/course/assignment/4/?id=M.Pavithra63ff86b2a81db8.59037514">
                <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" >
            </a><br><br><hr><br>

            <h4>Day 2</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2019</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 2</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><hr><br>

            <h4>Day 3</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2-Part B</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2021</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 3</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><hr><br>

            <h4>Day 4</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 3-Part A</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2018</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 4</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
        </div>
    </div>    
</div>
<script defer src="<?=ROOT?>/assets/js/assignmentEdit.js?v=<?php echo time(); ?>"></script>
 
<?php $this->view("includes/footer");?>